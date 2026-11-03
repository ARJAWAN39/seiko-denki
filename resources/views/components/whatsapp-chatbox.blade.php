<div 
    x-show="chatOpen" 
    x-cloak 
    class="fixed inset-0 sm:inset-auto sm:bottom-6 sm:right-6 z-50 flex items-end sm:items-center justify-center pointer-events-none"
    x-data="{
        step: 1,
        selectedIntent: 'Request a Custom RFQ / Price Quotation',
        visitorName: '',
        companyName: '',
        projectNotes: '',
        intents: [
            'Request a Custom RFQ / Price Quotation',
            'Automotive Wire Harness (IATF 16949)',
            'Medical Device Cable Assembly (ISO 13485)',
            'Semiconductor Box Build / Cleanroom Wiring',
            'Consumer Audio/Video & Appliance Harness',
            'Factory Plant Audit / Partner Consultation in JB',
            'General Technical Inquiry & Schematics Review'
        ],
        submitChat() {
            if (!this.visitorName.trim()) return;
            const companyPart = this.companyName ? ` from *${this.companyName}*` : '';
            const notesPart = this.projectNotes ? `\n\n*Project Specifications:* ${this.projectNotes}` : '';
            const message = `Hello Seiko Denki Sales & Engineering Team,\n\nMy name is *${this.visitorName}*${companyPart}.\nI am inquiring regarding: *${this.selectedIntent}*.${notesPart}\n\nLooking forward to your advice and quotation.`;
            const encoded = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/60123548282?text=${encoded}`;
            window.open(whatsappUrl, '_blank');
            this.chatOpen = false;
        }
    }"
    x-init="$watch('chatInquiry', value => { if (value) { selectedIntent = value; step = 2; } })"
>
    <div 
        @click.outside="chatOpen = false"
        class="bg-white w-full sm:w-[420px] rounded-t-3xl sm:rounded-3xl shadow-2xl border border-slate-200/90 overflow-hidden pointer-events-auto flex flex-col max-h-[90vh] sm:max-h-[640px] animate-in slide-in-from-bottom duration-300"
    >
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-slate-900 text-white p-5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-300">
                    <i data-lucide="message-square" class="w-5 h-5 text-emerald-400"></i>
                </div>
                <div>
                    <div class="flex items-center gap-1.5">
                        <h4 class="font-bold text-sm text-white">Seiko Denki Live Help</h4>
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    </div>
                    <p class="text-[11px] text-slate-300">Fast-Track WhatsApp Sales & Engineering Desk</p>
                </div>
            </div>
            <button @click="chatOpen = false" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-xs transition-colors">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>

        <!-- Content Body -->
        <div class="p-5 flex-1 overflow-y-auto space-y-4 text-slate-700 text-sm">
            
            <!-- Welcome message -->
            <div class="flex gap-2.5 items-start">
                <div class="w-7 h-7 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-mono font-bold text-xs flex-shrink-0">
                    SD
                </div>
                <div class="bg-slate-100 p-3.5 rounded-2xl rounded-tl-sm text-xs leading-relaxed text-slate-700">
                    👋 Welcome to <strong>Seiko Denki (M) Sdn. Bhd.</strong>! To ensure you are connected to the right wire harness engineering specialist, please answer a few quick questions.
                </div>
            </div>

            <!-- Step 1: Intent Selection -->
            <div x-show="step === 1" class="space-y-3 pt-2">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">
                    Step 1 of 2: What can we help you with?
                </span>
                <div class="space-y-1.5">
                    <template x-for="(intent, i) in intents" :key="i">
                        <button
                            @click="selectedIntent = intent; step = 2"
                            class="w-full text-left p-3 rounded-xl border border-slate-200 hover:border-blue-500 hover:bg-blue-50/70 text-xs font-medium text-slate-800 transition-all flex items-center justify-between group"
                        >
                            <span x-text="intent"></span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-0.5 transition-transform"></i>
                        </button>
                    </template>
                </div>
            </div>

            <!-- Step 2: Contact Details -->
            <form x-show="step === 2" @submit.prevent="submitChat()" class="space-y-3.5 pt-1">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">
                        Step 2 of 2: Your Details
                    </span>
                    <button type="button" @click="step = 1" class="text-[11px] text-blue-600 hover:underline font-medium">
                        Change Topic
                    </button>
                </div>

                <div class="p-2.5 rounded-xl bg-blue-50 border border-blue-200/70 text-xs text-blue-900 flex items-center gap-2">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-blue-600 flex-shrink-0"></i>
                    <span class="truncate font-semibold" x-text="selectedIntent"></span>
                </div>

                <div class="space-y-3">
                    <div>
                        <label class="text-xs font-semibold text-slate-700 block mb-1">Your Name *</label>
                        <input
                            type="text"
                            required
                            placeholder="e.g. Jason Tan"
                            x-model="visitorName"
                            class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label class="text-xs font-semibold text-slate-700 block mb-1">Company / Organization</label>
                        <input
                            type="text"
                            placeholder="e.g. Acme Electronics Pte Ltd"
                            x-model="companyName"
                            class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>

                    <div>
                        <label class="text-xs font-semibold text-slate-700 block mb-1">Estimated Volumes / Wire Harness Specs</label>
                        <textarea
                            rows="2"
                            placeholder="e.g. 10,000 pcs monthly automotive wire harness, waterproof connectors..."
                            x-model="projectNotes"
                            class="w-full p-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        ></textarea>
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold shadow-lg shadow-emerald-600/30 flex items-center justify-center gap-2 transition-all"
                >
                    <i data-lucide="phone-call" class="w-4 h-4"></i>
                    <span>Continue to WhatsApp with Seiko Denki</span>
                </button>

                <p class="text-[11px] text-slate-400 text-center">
                    Instant routing to Johor Bahru Sales Desk (+607-354 8282)
                </p>
            </form>

        </div>
    </div>
</div>
