@extends('layouts.app')

@section('title', 'Contact Us | Seiko Denki (M) Sdn. Bhd. - Johor Bahru Plant')

@section('content')

<!-- 1. Hero Section: Full-Width Ambient Grade with Floating Royal Blue Badge -->
<x-page-hero 
    title="Contact Us &amp; Factory Plant"
    image="{{ asset('images/hd/hero_contact.jpg') }}"
    badgeWord1="Contact Us"
    badgeWord2="Seiko Denki"
/>

<!-- 2. Main Contact Section -->
<div class="py-16 sm:py-24 bg-white min-h-screen select-none" x-data="{ submitted: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 space-y-16">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 gsap-fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-[#1b54a5] text-xs font-bold uppercase tracking-wider">
                <i data-lucide="mail" class="w-3.5 h-3.5 text-[#1b54a5]"></i>
                <span>Direct Inquiries &amp; Factory Plant</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight">
                Contact Seiko Denki
            </h2>
            <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                Get in touch with our wire harness engineering and sales team in Johor Bahru. We provide technical consultations, drawing audits, and quotation tenders.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Company Details Column (5 Cols) -->
            <div class="lg:col-span-5 space-y-6 gsap-fade-up">
                <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm space-y-6">
                    <div>
                        <h3 class="text-2xl font-extrabold text-slate-900">Seiko Denki (M) Sdn. Bhd.</h3>
                        <p class="text-xs uppercase tracking-wider text-[#1b54a5] font-bold mt-1">
                            Registration No: 199401018857 (304536-A)
                        </p>
                    </div>

                    <div class="space-y-5 text-sm text-slate-600">
                        <div class="flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-2xl bg-blue-50 text-[#1b54a5] flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <span class="font-bold text-slate-900 block text-xs uppercase text-slate-400">Plant Address</span>
                                <p class="leading-relaxed text-xs sm:text-sm text-slate-700 font-normal">
                                    Plo 95, Jalan Cyber 6, Kawasan Perindustrian Senai Fasa 3,<br />
                                    81400 Senai, Johor Darul Ta'zim, Malaysia.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-2xl bg-blue-50 text-[#1b54a5] flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <span class="font-bold text-slate-900 block text-xs uppercase text-slate-400">Telephone / Fax</span>
                                <p class="text-xs sm:text-sm text-slate-700 font-normal">
                                    Tel: <a href="tel:+6073548282" class="text-[#1b54a5] font-bold hover:underline">+607-354 8282</a><br />
                                    Fax: +607-354 8283
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-2xl bg-blue-50 text-[#1b54a5] flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <span class="font-bold text-slate-900 block text-xs uppercase text-slate-400">Email Inquiries</span>
                                <p class="text-xs sm:text-sm text-slate-700 font-normal">
                                    <a href="mailto:info@seikodenki.com.my" class="text-[#1b54a5] font-bold hover:underline">
                                        info@seikodenki.com.my
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-2xl bg-blue-50 text-[#1b54a5] flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm">
                                <i data-lucide="clock" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <span class="font-bold text-slate-900 block text-xs uppercase text-slate-400">Operating Hours</span>
                                <p class="text-xs sm:text-sm text-slate-700 font-normal">
                                    Monday – Friday: 8:00 AM – 5:30 PM (MYT)<br />
                                    Saturday – Sunday: Closed
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Fast WhatsApp Callout -->
                    <div class="p-5 rounded-2xl bg-emerald-50 border border-emerald-200/80 space-y-2.5">
                        <span class="text-xs font-bold text-emerald-800 flex items-center gap-2">
                            <i data-lucide="message-square" class="w-4 h-4 text-emerald-600"></i>
                            <span>Prefer Quick WhatsApp Conversation?</span>
                        </span>
                        <p class="text-xs text-emerald-700 leading-relaxed font-normal">
                            Connect with our on-duty engineer right away through our live qualifying chat assistant.
                        </p>
                        <button
                            type="button"
                            @click="chatOpen = true; chatInquiry = 'Direct Contact RFQ'"
                            class="w-full mt-2 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-md transition-all flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                            <span>Launch WhatsApp Chatbot</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Inquiry Form Column (7 Cols) -->
            <div class="lg:col-span-7 gsap-fade-up">
                <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/90 shadow-sm">
                    <div class="mb-8 space-y-1">
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Send an Official RFQ / Inquiry</h3>
                        <p class="text-xs sm:text-sm text-slate-500 font-normal">
                            Our engineering representative will review your request and reply within 24 business hours.
                        </p>
                    </div>

                    <div x-show="submitted" class="p-8 rounded-2xl bg-blue-50 border border-blue-200 text-center space-y-3">
                        <div class="w-12 h-12 rounded-full bg-[#1b54a5] text-white flex items-center justify-center mx-auto shadow-md">
                            <i data-lucide="check-circle-2" class="w-6 h-6"></i>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Inquiry Received</h4>
                        <p class="text-xs sm:text-sm text-slate-600 max-w-md mx-auto">
                            Thank you for reaching out to Seiko Denki (M) Sdn. Bhd. An engineering representative has been assigned to your request and will contact you via email shortly.
                        </p>
                        <button
                            @click="submitted = false"
                            class="px-5 py-2.5 rounded-xl bg-[#1b54a5] text-white text-xs font-bold hover:bg-[#134074] shadow-md transition-colors"
                        >
                            Submit Another Inquiry
                        </button>
                    </div>

                    <form x-show="!submitted" @submit.prevent="submitted = true" class="space-y-5 text-slate-800">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1.5">Full Name *</label>
                                <input
                                    type="text"
                                    required
                                    placeholder="Your Name"
                                    class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200/90 focus:outline-none focus:ring-2 focus:ring-[#1b54a5] bg-slate-50/50"
                                />
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1.5">Company / Organization *</label>
                                <input
                                    type="text"
                                    required
                                    placeholder="Company Name"
                                    class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200/90 focus:outline-none focus:ring-2 focus:ring-[#1b54a5] bg-slate-50/50"
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1.5">Business Email *</label>
                                <input
                                    type="email"
                                    required
                                    placeholder="name@company.com"
                                    class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200/90 focus:outline-none focus:ring-2 focus:ring-[#1b54a5] bg-slate-50/50"
                                />
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-700 block mb-1.5">Phone / WhatsApp *</label>
                                <input
                                    type="tel"
                                    required
                                    placeholder="+60 12-345 6789"
                                    class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200/90 focus:outline-none focus:ring-2 focus:ring-[#1b54a5] bg-slate-50/50"
                                />
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 block mb-1.5">Product Application Category *</label>
                            <select class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200/90 focus:outline-none focus:ring-2 focus:ring-[#1b54a5] bg-slate-50/50">
                                <option>Automotive Wire Harness Loom</option>
                                <option>Medical Device Interconnect Assembly</option>
                                <option>Semiconductor &amp; Cleanroom Cabling</option>
                                <option>Industrial Automation &amp; Robotics</option>
                                <option>Security &amp; Surveillance Systems</option>
                                <option>Consumer Electronics &amp; Appliances</option>
                                <option>Custom Spec / Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 block mb-1.5">Project Specifications &amp; Quantities *</label>
                            <textarea
                                rows="4"
                                required
                                placeholder="Describe your wire specifications, pin counts, estimated annual usage (EAU), or upload requirements..."
                                class="w-full px-4 py-3 text-xs sm:text-sm rounded-xl border border-slate-200/90 focus:outline-none focus:ring-2 focus:ring-[#1b54a5] bg-slate-50/50"
                            ></textarea>
                        </div>

                        <div class="pt-2">
                            <button
                                type="submit"
                                class="w-full py-4 rounded-xl bg-[#1b54a5] hover:bg-[#134074] text-white text-sm font-bold shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2 cursor-pointer"
                            >
                                <span>Submit Official Quotation Request</span>
                                <i data-lucide="send" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- 3. Shared CTA Partner Ribbon Component -->
<x-cta-partner-ribbon />

<!-- 4. Shared Dual Location Cards Component -->
<x-location-cards />

@endsection
