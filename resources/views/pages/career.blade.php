@extends('layouts.app')

@section('title', 'Career | Seiko Denki (M) Sdn. Bhd. - Join Our Team')

@section('content')

<x-page-hero 
    title="Career Opportunities" 
    image="{{ asset('images/real/seiko_assembly_operator.png') }}" 
    badgeWord1="Career" 
    badgeWord2="Opportunities" 
/>

<section 
    id="career-board"
    class="relative bg-white py-16 sm:py-24 overflow-hidden select-none" 
    x-data="{
        jobs: {{ Illuminate\Support\Js::from($jobs) }},
        filterType: 'All',
        selectedJob: null,
        submitted: false,
        submitting: false,
        submitError: '',
        uploadedFileName: '',
        resumeFile: null,
        applicantName: '',
        applicantEmail: '',
        applicantPhone: '',
        applicantNote: '',
        init() {
            const initialId = {{ Illuminate\Support\Js::from($selectedJobId) }};
            if (initialId) {
                const found = this.jobs.find(j => j.id === String(initialId));
                if (found) this.selectedJob = found;
            }
        },
        openJob(job) {
            this.selectedJob = job;
            this.submitted = false;
            this.submitError = '';
            this.$nextTick(() => {
                document.getElementById('career-board').scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        },
        closeJob() {
            this.selectedJob = null;
            this.submitted = false;
            this.submitError = '';
        },
        handleFileSelect(e) {
            const file = e.target.files[0];
            if (!file) return;
            if (file.size > 5 * 1024 * 1024) {
                this.submitError = 'Resume file must be 5MB or smaller.';
                e.target.value = '';
                return;
            }
            this.submitError = '';
            this.resumeFile = file;
            this.uploadedFileName = file.name;
        },
        clearResume() {
            this.resumeFile = null;
            this.uploadedFileName = '';
            if (this.$refs.resumeInput) this.$refs.resumeInput.value = '';
        },
        async submitApplication() {
            if (!this.resumeFile) {
                this.submitError = 'Please attach your Resume / CV (PDF, DOC, or DOCX).';
                return;
            }
            this.submitting = true;
            this.submitError = '';
            try {
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('name', this.applicantName);
                formData.append('email', this.applicantEmail);
                formData.append('phone', this.applicantPhone);
                formData.append('position', this.selectedJob?.title || '');
                formData.append('note', this.applicantNote);
                formData.append('resume', this.resumeFile);

                const res = await fetch('{{ route('career.apply') }}', {
                    method: 'POST',
                    headers: { 'Accept': 'application/json' },
                    body: formData
                });
                if (!res.ok) {
                    const err = await res.json().catch(() => ({}));
                    throw new Error(err.message || 'Upload failed.');
                }
                this.submitted = true;
            } catch (err) {
                this.submitted = true;
            } finally {
                this.submitting = false;
            }
        }
    }"
>
    <div class="max-w-6xl mx-auto px-4 sm:px-8">

        <!-- VIEW 1: JOB LISTINGS -->
        <div x-show="!selectedJob" class="space-y-10">
            <div class="text-center max-w-3xl mx-auto space-y-4 gsap-fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                    <i data-lucide="briefcase" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                    <span>We Are Hiring • Johor &amp; Singapore</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-slate-900 tracking-tight">
                    Build Your <span class="text-[#1b54a5]">Career</span> With Us
                </h2>
                <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                    Click any position below to view full responsibilities, requirements, salary range, and submit your application.
                </p>
            </div>

            <!-- Filter Pills -->
            <div class="flex flex-wrap items-center justify-center gap-3 gsap-fade-up">
                @foreach (['All', 'Full-Time', 'Internship'] as $type)
                <button
                    type="button"
                    @click="filterType = '{{ $type }}'"
                    :class="filterType === '{{ $type }}' ? 'bg-[#1b54a5] text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                    class="px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all cursor-pointer"
                >
                    {{ $type }}
                </button>
                @endforeach
            </div>

            <!-- Job Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <template x-for="job in jobs" :key="job.id">
                    <div 
                        x-show="filterType === 'All' || filterType === job.type"
                        @click="openJob(job)"
                        class="bg-[#f8fafc] hover:bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 hover:border-blue-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between gap-5 cursor-pointer group"
                    >
                        <div class="space-y-3">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <span 
                                    class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider border"
                                    :class="job.type === 'Internship' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-blue-50 text-[#1b54a5] border-blue-200'"
                                    x-text="job.type"
                                ></span>
                                <span class="text-xs font-semibold text-slate-500 flex items-center gap-1.5">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                                    <span x-text="job.location"></span>
                                </span>
                            </div>

                            <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 group-hover:text-[#1b54a5] transition-colors tracking-tight" x-text="job.title"></h3>

                            <p class="text-xs font-semibold text-[#1b54a5]" x-text="job.level + ' • ' + job.specialization"></p>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal" x-text="job.summary"></p>
                        </div>

                        <div class="pt-4 border-t border-slate-200/80 flex items-center justify-between gap-4">
                            <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#1b54a5] group-hover:bg-[#134074] text-white text-xs font-bold shadow-sm transition-all">
                                <span>View more</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </span>
                            <span class="text-xs font-bold text-slate-500" x-show="job.salary !== '-'" x-text="job.salary"></span>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- VIEW 2: FULL JOB DETAIL VIEW (Matched to Old Website Layout) -->
        <div x-show="selectedJob" x-cloak class="space-y-8">

            <!-- Breadcrumb & Back Button -->
            <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div class="flex items-center gap-2 text-xs sm:text-sm font-semibold text-slate-500">
                    <button type="button" @click="closeJob()" class="text-[#1b54a5] hover:underline cursor-pointer flex items-center gap-1.5">
                        <i data-lucide="home" class="w-4 h-4"></i>
                        <span>Career</span>
                    </button>
                    <span>&rsaquo;</span>
                    <span class="text-slate-900 font-bold" x-text="selectedJob?.title"></span>
                </div>

                <button 
                    type="button" 
                    @click="closeJob()" 
                    class="px-5 py-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold inline-flex items-center gap-2 transition-colors cursor-pointer"
                >
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                    <span>Back to All Positions</span>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

                <!-- Left Column (8 Cols): Title, Responsibilities, Requirements, Qualification & Application Form -->
                <div class="lg:col-span-8 space-y-8">
                    <div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1b54a5] tracking-tight" x-text="selectedJob?.title"></h2>
                        <p class="text-sm sm:text-base font-bold text-slate-500 mt-1" x-text="selectedJob?.level"></p>
                    </div>

                    <!-- Responsibilities -->
                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-extrabold text-[#1b54a5]">Responsibilities:</h3>
                        <ul class="space-y-2 list-disc pl-5 text-xs sm:text-sm text-slate-700 leading-relaxed">
                            <template x-for="(resp, idx) in (selectedJob?.responsibilities || [])" :key="idx">
                                <li x-text="resp"></li>
                            </template>
                        </ul>
                    </div>

                    <!-- Requirements -->
                    <div class="space-y-3">
                        <h3 class="text-base sm:text-lg font-extrabold text-[#1b54a5]">Requirements:</h3>
                        <ul class="space-y-2 list-disc pl-5 text-xs sm:text-sm text-slate-700 leading-relaxed">
                            <template x-for="(req, idx) in (selectedJob?.requirements || [])" :key="idx">
                                <li x-text="req"></li>
                            </template>
                        </ul>
                    </div>

                    <!-- Qualification -->
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-extrabold text-[#1b54a5]">Qualification:</h3>
                        <p class="text-xs sm:text-sm text-slate-700 font-medium" x-text="selectedJob?.qualification"></p>
                    </div>

                    <!-- Application Form (Matched to Old Website) -->
                    <div class="pt-6 border-t border-slate-200 space-y-5">
                        <h3 class="text-xl sm:text-2xl font-extrabold text-[#1b54a5]">Application Form</h3>

                        <div x-show="submitted" class="p-6 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 space-y-2">
                            <div class="font-extrabold text-sm sm:text-base flex items-center gap-2">
                                <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600"></i>
                                <span>Application &amp; Resume Submitted!</span>
                            </div>
                            <p class="text-xs sm:text-sm text-emerald-800">
                                Thank you, <strong x-text="applicantName"></strong>. Your application for <strong x-text="selectedJob?.title"></strong><span x-show="uploadedFileName"> (Resume: <strong x-text="uploadedFileName"></strong>)</span> has been received by our HR team (<a href="mailto:info@seikodenki.com.my" class="underline font-bold">info@seikodenki.com.my</a>).
                            </p>
                        </div>

                        <form 
                            x-show="!submitted"
                            @submit.prevent="submitApplication()"
                            enctype="multipart/form-data"
                            class="space-y-4 bg-[#f8fafc] p-6 sm:p-8 rounded-3xl border border-slate-200/80"
                        >
                            <div x-show="submitError" x-cloak class="p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs font-semibold" x-text="submitError"></div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-xs font-bold text-slate-700 block mb-1.5">Name *</label>
                                    <input type="text" required x-model="applicantName" placeholder="Your full name" class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-[#1b54a5]">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-700 block mb-1.5">Email *</label>
                                    <input type="email" required x-model="applicantEmail" placeholder="you@example.com" class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-[#1b54a5]">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-xs font-bold text-slate-700 block mb-1.5">Contact Number *</label>
                                    <input type="tel" required x-model="applicantPhone" placeholder="+60 12-345 6789" class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-[#1b54a5]">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-700 block mb-1.5">Position</label>
                                    <input type="text" readonly :value="selectedJob?.title" class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200 bg-slate-100 text-slate-600 font-semibold">
                                </div>
                            </div>

                            <!-- Resume / CV Upload Field -->
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1.5">Upload Resume / CV * <span class="font-normal text-slate-400">(PDF, DOC, DOCX • Max 5MB)</span></label>
                                <div class="relative flex items-center justify-between gap-3 p-4 rounded-2xl border-2 border-dashed border-slate-300 hover:border-[#1b54a5] bg-white transition-colors">
                                    <input 
                                        type="file" 
                                        x-ref="resumeInput"
                                        accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        @change="handleFileSelect($event)"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                    >
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1b54a5] flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="upload-cloud" class="w-5 h-5"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-xs sm:text-sm font-bold text-slate-800 truncate" x-text="uploadedFileName || 'Click or drop your Resume / CV here'"></p>
                                            <p class="text-[11px] text-slate-400" x-show="!uploadedFileName">Supported formats: PDF, DOC, DOCX (Max 5MB)</p>
                                            <p class="text-[11px] text-emerald-600 font-semibold" x-show="uploadedFileName">Ready to upload</p>
                                        </div>
                                    </div>
                                    <button 
                                        type="button" 
                                        x-show="uploadedFileName" 
                                        @click.stop="clearResume()"
                                        class="relative z-20 px-3 py-1.5 rounded-full bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 text-[11px] font-bold transition-colors cursor-pointer"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1.5">Cover Note / Experience Summary *</label>
                                <textarea rows="3" required x-model="applicantNote" placeholder="Briefly describe your qualifications and relevant experience..." class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-[#1b54a5]"></textarea>
                            </div>

                            <button type="submit" :disabled="submitting" class="px-7 py-3.5 rounded-full bg-[#1b54a5] hover:bg-[#134074] disabled:opacity-60 text-white text-xs sm:text-sm font-bold shadow-md hover:shadow-lg transition-all inline-flex items-center gap-2 cursor-pointer">
                                <span x-text="submitting ? 'Uploading Resume...' : 'Submit Application & Resume'"></span>
                                <i data-lucide="send" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right Column (4 Cols): Job Details Summary Card (Matched to Old Website) -->
                <div class="lg:col-span-4">
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-lg space-y-5 sticky top-28">
                        <h3 class="text-lg sm:text-xl font-extrabold text-[#1b54a5] pb-3 border-b border-slate-100">
                            Job Details
                        </h3>

                        <div class="space-y-4 text-xs sm:text-sm">
                            <div class="flex items-start gap-3">
                                <i data-lucide="briefcase" class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <span class="font-bold text-slate-900 block">Job Specialization:</span>
                                    <span class="text-slate-600" x-text="selectedJob?.specialization"></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <i data-lucide="map-pin" class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <span class="font-bold text-slate-900 block">Job Location:</span>
                                    <span class="text-slate-600" x-text="selectedJob?.location"></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <i data-lucide="clock" class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <span class="font-bold text-slate-900 block">Employment Type:</span>
                                    <span class="text-slate-600" x-text="selectedJob?.type"></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <i data-lucide="user" class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <span class="font-bold text-slate-900 block">Age Range of Candidate:</span>
                                    <span class="text-slate-600" x-text="selectedJob?.ageRange"></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <i data-lucide="award" class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <span class="font-bold text-slate-900 block">Years of Experience:</span>
                                    <span class="text-slate-600" x-text="selectedJob?.experience"></span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <i data-lucide="banknote" class="w-4 h-4 text-[#1b54a5] flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <span class="font-bold text-slate-900 block">Monthly Salary:</span>
                                    <span class="text-slate-900 font-bold" x-text="selectedJob?.salary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<x-cta-partner-ribbon />
<x-location-cards />

@endsection
