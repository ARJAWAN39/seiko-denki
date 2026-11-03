<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Home Page (100% Figma Prototype layout)
     */
    public function home()
    {
        $heroSlides = [
            [
                'title' => 'Trusted Wire Harness Manufacturing Partner',
                'subtitle' => 'High-Reliability Interconnect Solutions for Global OEM Leaders',
                'tag' => 'Next-Gen Manufacturing',
                'image' => asset('images/hd/hero_slide_1.jpg'),
            ],
            [
                'title' => 'Zero-Defect Quality with Digital Crimp Testing',
                'subtitle' => 'AFNOR IATF 16949 Automotive & ISO 13485 Medical Device Standards',
                'tag' => 'Certified Precision',
                'image' => asset('images/hd/hero_slide_2.jpg'),
            ],
            [
                'title' => 'Cleanroom Box Builds & Semiconductor Wiring',
                'subtitle' => 'High-Density Harnesses Built for SMT Machines & Wafer Systems',
                'tag' => 'High-Tech Equipment',
                'image' => asset('images/hd/hero_slide_3.jpg'),
            ]
        ];

        $floatingStats = [
            ['value' => '30+', 'label' => 'Years Experience', 'sub' => 'Established Track Record', 'icon' => 'calendar'],
            ['value' => '500+', 'label' => 'Projects & Workforce', 'sub' => 'Skilled Technicians', 'icon' => 'users'],
            ['value' => '3', 'label' => 'Production Plants / Lines', 'sub' => 'Johor Bahru Hub', 'icon' => 'factory'],
            ['value' => '100%', 'label' => 'Continuity Tested', 'sub' => 'Computerized Verification', 'icon' => 'shield-check'],
        ];

        $businessScopes = $this->getBusinessScopes();
        $respectiveClients = $this->getRespectiveClients();

        return view('pages.home', compact('heroSlides', 'floatingStats', 'businessScopes', 'respectiveClients'));
    }

    /**
     * About Us Page (100% Figma Prototype layout)
     */
    public function about()
    {
        $milestones = [
            ['year' => 'Phase 1', 'title' => 'Foundation in Johor Bahru', 'desc' => 'Established wire harness production facility in Tebrau 1 focusing on international consumer audio and video equipment.'],
            ['year' => 'Phase 2', 'title' => 'ISO 9001 & Industrial Growth', 'desc' => 'Achieved ISO 9001 accreditation and expanded into automated wire processing for security and heavy industrial machinery.'],
            ['year' => 'Phase 3', 'title' => 'IATF 16949 & Medical Expansion', 'desc' => 'Earned IATF 16949 automotive and ISO 13485 medical device quality certifications, becoming approved tier-1 partner for global OEMs.'],
            ['year' => 'Present', 'title' => 'Industry 4.0 & ESG Solar', 'desc' => 'Integrated automated digital crimp force monitoring, semi-con clean cabling lines, and 350kWp rooftop solar green energy.'],
        ];

        return view('pages.about', compact('milestones'));
    }

    /**
     * Modern Products Catalog
     */
    public function products(Request $request)
    {
        $category = $request->query('category', 'All');
        $allProducts = $this->getProducts();

        $products = ($category === 'All') 
            ? $allProducts 
            : array_filter($allProducts, fn($p) => strtolower($p['category']) === strtolower($category));

        $categories = ['All', 'Automotive', 'Medical', 'Semi-Con', 'Consumer', 'Security', 'Aerospace'];

        return view('pages.products', compact('products', 'categories', 'category', 'allProducts'));
    }

    /**
     * Combined Achievements Page (Certificates + Awards per jkwh.com.my layout)
     */
    public function achievements(Request $request)
    {
        $filter = $request->query('type', 'all');
        $allAchievements = $this->getAchievements();

        $achievements = ($filter === 'all')
            ? $allAchievements
            : array_filter($allAchievements, fn($a) => $a['type'] === $filter);

        return view('pages.achievements', compact('achievements', 'filter'));
    }

    /**
     * Events & News Page (per jkwh.com.my layout, no Read More hops)
     */
    public function news()
    {
        $newsItems = $this->getNews();
        return view('pages.news', compact('newsItems'));
    }

    /**
     * Facilities Tour Page
     */
    public function facilities()
    {
        $facilities = [
            [
                'title' => 'Automated Multi-Wire Cutting & Stripping Station',
                'desc' => 'High-precision Japanese automated processing units with computerized length control and dual-end terminal crimping.',
                'tag' => 'Automated Machinery',
                'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'title' => 'Digital Crimp Force Analysis & Micro-Section Lab',
                'desc' => 'Continuous real-time crimp force monitoring (CFM) and metallurgical cross-section inspection verifying gas-tight joint crimps.',
                'tag' => 'QA Testing Station',
                'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'title' => '100% Computerized Continuity & Hi-Pot Testing Jigs',
                'desc' => 'Dedicated pin-by-pin electrical continuity, miswire detection, contact resistance, and high-voltage dielectric breakdown testing.',
                'tag' => 'Electrical Inspection',
                'image' => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'title' => 'ISO 13485 Cleanroom Assembly & Packaging',
                'desc' => 'Dust-controlled environment dedicated to bio-compatible medical cable harnesses and semiconductor front-end cabling.',
                'tag' => 'Medical Cleanroom',
                'image' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
            ]
        ];

        return view('pages.facilities', compact('facilities'));
    }

    /**
     * Contact Us Page
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Executive Website Report / Analytics Dashboard (Feature 2 in Document)
     */
    public function analytics(Request $request)
    {
        $period = $request->query('period', 'monthly');

        $analytics = [
            'period' => $period,
            'totalVisits' => ($period === 'weekly') ? 3840 : 16290,
            'growthRate' => ($period === 'weekly') ? '+14.2%' : '+22.5%',
            'whatsAppLeads' => ($period === 'weekly') ? 38 : 142,
            'mobilePercent' => 44,
            'desktopPercent' => 56,
            'topPages' => [
                ['name' => 'Home Page', 'views' => 8940, 'percent' => 55],
                ['name' => 'Our Products (Wire Harness)', 'views' => 3710, 'percent' => 23],
                ['name' => 'Achievements (Certificates & Awards)', 'views' => 1820, 'percent' => 11],
                ['name' => 'About Us & Facilities', 'views' => 1120, 'percent' => 7],
                ['name' => 'Contact & Inquiries', 'views' => 700, 'percent' => 4],
            ],
            'topProducts' => [
                ['name' => 'Automotive Engine Harness Looms', 'views' => 1420],
                ['name' => 'Medical Grade TPU Cable Assemblies', 'views' => 980],
                ['name' => 'Semiconductor SMT Box Builds', 'views' => 760],
                ['name' => 'Audio/Video & Home Appliance Harness', 'views' => 550],
            ],
            'visitorLocations' => [
                ['country' => 'Malaysia (Johor, KL, Penang)', 'visitors' => 9850, 'flag' => '🇲🇾'],
                ['country' => 'Singapore', 'visitors' => 3410, 'flag' => '🇸🇬'],
                ['country' => 'Japan', 'visitors' => 1120, 'flag' => '🇯🇵'],
                ['country' => 'United States', 'visitors' => 890, 'flag' => '🇺🇸'],
                ['country' => 'Germany / Europe', 'visitors' => 640, 'flag' => '🇩🇪'],
                ['country' => 'Others', 'visitors' => 380, 'flag' => '🌐'],
            ],
            'dailyTraffic' => [
                ['day' => 'Mon', 'visits' => 540, 'leads' => 18],
                ['day' => 'Tue', 'visits' => 620, 'leads' => 24],
                ['day' => 'Wed', 'visits' => 710, 'leads' => 28],
                ['day' => 'Thu', 'visits' => 680, 'leads' => 22],
                ['day' => 'Fri', 'visits' => 590, 'leads' => 20],
                ['day' => 'Sat', 'visits' => 380, 'leads' => 12],
                ['day' => 'Sun', 'visits' => 320, 'leads' => 18],
            ]
        ];

        return view('pages.analytics', compact('analytics'));
    }

    /**
     * 6 Business Scopes (Document Page 2)
     */
    private function getBusinessScopes(): array
    {
        return [
            [
                'id' => 'automotive',
                'title' => 'Automotive',
                'tagline' => 'Connects to Inspire your Auto Enthusiast.',
                'items' => ['Car Systems', 'Commercial Bus', 'Motorcycle Harnesses'],
                'icon' => 'car',
                'image' => 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'consumer',
                'title' => 'Consumer',
                'tagline' => 'Supreme jumping Electric force around you.',
                'items' => ['Electronic', 'Audio & Video', 'Home Appliance', 'Communication'],
                'icon' => 'tv',
                'image' => 'https://images.unsplash.com/photo-1550009158-9ebf69173e03?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'semi-con',
                'title' => 'Semi-Con',
                'tagline' => "Complex Module's with Thrilling Connection.",
                'items' => ['SMT', 'Wafer Machine', 'Box Build', 'Front End Module'],
                'icon' => 'cpu',
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'medical',
                'title' => 'Medical',
                'tagline' => 'Safest supply to shine your Heart Rate.',
                'items' => ['Medical System', 'Measuring Instrument'],
                'icon' => 'activity',
                'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'security',
                'title' => 'Security',
                'tagline' => 'Protect Safety with Eminence.',
                'items' => ['Luggage Scanner', 'Body Scanner'],
                'icon' => 'shield-check',
                'image' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'aerospace',
                'title' => 'Aerospace',
                'tagline' => 'Encompass many powerful technologies of creation whilst embracing advanced manufacturing processes.',
                'items' => ['Avionics Harnesses', 'High-Temp Shielded Wiring', 'Flight Control Interconnects'],
                'icon' => 'plane',
                'image' => 'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&w=800&q=80',
            ]
        ];
    }

    /**
     * Respective Clients (Document Page 2)
     */
    private function getRespectiveClients(): array
    {
        return [
            ['name' => 'ABB', 'category' => 'Industrial Automation & Robotics', 'logoText' => 'ABB', 'color' => 'text-red-600'],
            ['name' => 'Celestica', 'category' => 'Electronics Manufacturing Services', 'logoText' => 'Celestica.', 'color' => 'text-blue-700'],
            ['name' => 'Dyson', 'category' => 'High-Tech Consumer Appliances', 'logoText' => 'dyson', 'color' => 'text-slate-900'],
            ['name' => 'Fisher & Paykel', 'category' => 'Premium Appliances & Healthcare', 'logoText' => 'Fisher & Paykel', 'color' => 'text-blue-900'],
            ['name' => 'Flex', 'category' => 'Global Diversified Manufacturing', 'logoText' => 'flex', 'color' => 'text-sky-600'],
            ['name' => 'Panasonic', 'category' => 'Consumer & Industrial Electronics', 'logoText' => 'Panasonic', 'color' => 'text-blue-800'],
            ['name' => 'TT Technologies', 'category' => 'Engineered Industrial Assemblies', 'logoText' => 'TT TECHNOLOGIES', 'color' => 'text-teal-700'],
            ['name' => 'Rotimatic', 'category' => 'Automated Robotics (Zimplistic)', 'logoText' => 'Rotimatic', 'color' => 'text-amber-600'],
        ];
    }

    /**
     * Achievements Dataset
     */
    private function getAchievements(): array
    {
        return [
            [
                'id' => 'iatf-16949',
                'type' => 'certificate',
                'title' => 'IATF 16949 : 2016 Automotive Quality Management',
                'issuer' => 'AFAQ / AFNOR Certification',
                'year' => 'Certified & Validated',
                'code' => 'IATF 16949',
                'description' => 'International automotive standard demonstrating zero defect manufacturing and supply chain reliability.',
                'badge' => 'Automotive Gold Standard',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'iso-13485',
                'type' => 'certificate',
                'title' => 'ISO 13485 : 2016 Medical Devices Quality System',
                'issuer' => 'AFAQ / AFNOR Certification',
                'year' => 'Certified & Validated',
                'code' => 'ISO 13485',
                'description' => 'Requirements for comprehensive quality management system for the design and manufacture of medical devices.',
                'badge' => 'Medical Device Standard',
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'iso-9001',
                'type' => 'certificate',
                'title' => 'ISO 9001 : 2015 Quality Management Systems',
                'issuer' => 'AFAQ / AFNOR Certification',
                'year' => 'Certified & Validated',
                'code' => 'ISO 9001',
                'description' => 'Internationally recognized standard ensuring consistent quality products and continuous operational improvement.',
                'badge' => 'Core Quality System',
                'image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'whma-member',
                'type' => 'certificate',
                'title' => 'WHMA / IPC-A-620 Standards Membership',
                'issuer' => 'Wiring Harness Manufacturer’s Association',
                'year' => 'Active Industry Standing',
                'code' => 'WHMA / IPC',
                'description' => 'Commitment to world-class wire harness and cable assembly acceptance and craftsmanship specifications.',
                'badge' => 'Global Harness Guild',
                'image' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'ul-curus',
                'type' => 'certificate',
                'title' => 'cURus Recognized Component Certification',
                'issuer' => 'Underwriters Laboratories (UL)',
                'year' => 'Compliant',
                'code' => 'UL Certified',
                'description' => 'Safety and compliance certification across Canadian and US industrial quality standards.',
                'badge' => 'Safety Compliance',
                'image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'rohs-reach',
                'type' => 'certificate',
                'title' => 'RoHS 3 & REACH Environmental Directives',
                'issuer' => 'Global Compliance Assessment',
                'year' => 'Active Directive',
                'code' => 'RoHS / REACH',
                'description' => 'Restriction of Hazardous Substances and full regulatory tracking of all raw material chemicals.',
                'badge' => 'Eco-Green Safe',
                'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'award-excellence-2024',
                'type' => 'award',
                'title' => 'Outstanding Supplier of the Year in Quality & Delivery',
                'issuer' => 'Tier-1 Multinational Client Consortium',
                'year' => '2024',
                'code' => 'AWARD-2024',
                'description' => 'Recognized for achieving 99.98% on-time delivery rate and zero defect ppm throughout fiscal quarters.',
                'badge' => 'Supplier Excellence',
                'image' => 'https://images.unsplash.com/photo-1578269174936-2709b6aeb913?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'award-innovation',
                'type' => 'award',
                'title' => 'Industrial Manufacturing Innovation Award',
                'issuer' => 'Malaysian Wire & Cable Industry Federation',
                'year' => '2023',
                'code' => 'INNOVATION-23',
                'description' => 'Awarded for advanced semi-automated crimping and laser wire processing enhancements.',
                'badge' => 'Industry Honors',
                'image' => 'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?auto=format&fit=crop&w=700&q=80',
            ]
        ];
    }

    /**
     * Events & News Dataset
     */
    private function getNews(): array
    {
        return [
            [
                'id' => 'news-1',
                'title' => 'Seiko Denki Upgrades High-Speed Automated Wire Cutting & Crimping Center',
                'date' => 'September 2026',
                'category' => 'Technology & Investment',
                'summary' => 'To support surging EV automotive harness demands, our Johor Bahru facility has installed state-of-the-art Japanese automated multi-wire processing units with 100% digital crimp-force monitoring.',
                'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'news-2',
                'title' => 'Annual ISO 13485 & IATF 16949 Surveillance Audit Completed with Zero Non-Conformance',
                'date' => 'July 2026',
                'category' => 'Quality Assurance',
                'summary' => 'Our continuous training and rigorous quality management have resulted in a pristine audit score by AFNOR certification officers, underscoring our dedication to precision medical & automotive wiring.',
                'image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'news-3',
                'title' => 'Participation at SEMICON Southeast Asia Engineering Showcase',
                'date' => 'May 2026',
                'category' => 'Exhibition & Trade',
                'summary' => 'Seiko Denki demonstrated our high-precision box build wiring assemblies and cleanroom harness capabilities for wafer fabrication and SMT machines to regional semiconductor leaders.',
                'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'id' => 'news-4',
                'title' => 'Corporate Social Responsibility: Green Manufacturing & Solar Energy Commissioning',
                'date' => 'March 2026',
                'category' => 'Sustainability',
                'summary' => 'Our Tebrau 1 plant has successfully energized 350kWp rooftop solar photovoltaic panels, lowering carbon footprints in support of international ESG compliance standards.',
                'image' => asset('images/hd/news_solar.jpg'),
            ]
        ];
    }

    /**
     * Products Dataset
     */
    private function getProducts(): array
    {
        return [
            [
                'id' => 'prod-auto',
                'code' => 'SEIKO-AUT-01',
                'name' => 'Automotive Engine & Chassis Wire Harness',
                'category' => 'Automotive',
                'description' => 'Custom engineered wiring looms for ICE vehicles, commercial transport, and EV battery management interconnects with automotive sealed housings.',
                'wireGauge' => '12 – 28 AWG (XLPE / Cross-linked)',
                'standard' => 'IPC/WHMA Class 3',
                'standardColor' => 'bg-red-50 text-red-700 border-red-200/80',
                'connectors' => ['Yazaki', 'TE Connectivity', 'Aptiv', 'Deutsch IP68'],
                'tolerances' => '±1.0mm Length / CFM Real-Time Monitored',
                'testing' => '100% Electrical Continuity & High-Voltage Dielectric Testing',
                'specs' => [
                    'Heat resistant cross-linked polyethylene (XLPE) jacket',
                    'IP67/IP68 sealed waterproof connector interfaces',
                    'Flame retardant corrugated loom protective conduit',
                    'Computerized digital continuity & crimp force analysis'
                ],
                'application' => 'Commercial buses, automotive engine compartments, sensor clusters, EV BMS.',
                'image' => asset('images/hd/prod_automotive.jpg'),
            ],
            [
                'id' => 'prod-med',
                'code' => 'SEIKO-MED-02',
                'name' => 'Precision Medical Device Cable Assembly',
                'category' => 'Medical',
                'description' => 'Bio-compatible, low-noise shielded cable assemblies manufactured in cleanroom conditions complying strictly with ISO 13485 standards.',
                'wireGauge' => '24 – 36 AWG (Micro-Coax / Silicone)',
                'standard' => 'ISO 13485 Compliant',
                'standardColor' => 'bg-sky-50 text-sky-700 border-sky-200/80',
                'connectors' => ['Lemo Push-Pull', 'Molex Micro-Fit', 'Hypertronics', 'Fischer'],
                'tolerances' => 'Sub-Millimeter Micro-Crimp / Zero Flux Residue',
                'testing' => 'Ultra-low signal loss & 500V DC Insulation Resistance verified',
                'specs' => [
                    'Medical-grade biocompatible silicone & TPU outer jackets',
                    '100% dual-layer copper braided shield against EMI/RFI noise',
                    'Steam autoclave and chemical wipe sterilizable construction',
                    'Ultra-flexible high-strand micro-conductor conductors'
                ],
                'application' => 'Patient monitoring systems, defibrillators, surgical ultrasound probes, endoscopy.',
                'image' => asset('images/hd/prod_medical.jpg'),
            ],
            [
                'id' => 'prod-semi',
                'code' => 'SEIKO-SEM-03',
                'name' => 'Semiconductor Box Build & Equipment Loom',
                'category' => 'Semi-Con',
                'description' => 'High-density signal and multi-channel power routing assemblies built to withstand cleanroom environments and continuous robotic motion.',
                'wireGauge' => '16 – 32 AWG (Continuous-Flex)',
                'standard' => 'Cleanroom Class 100',
                'standardColor' => 'bg-indigo-50 text-indigo-700 border-indigo-200/80',
                'connectors' => ['JST PH/XH', 'Hirose DF13', 'High-Density D-Sub', 'Molex'],
                'tolerances' => 'Precision Pin-by-Pin Alignment / Point-to-Point Testing',
                'testing' => 'Cirris digital fixture testing up to 1,024 test points',
                'specs' => [
                    'High-flex drag chain cable rated up to 10M continuous bend cycles',
                    'Low-outgassing zero-halogen jacket materials',
                    'Custom point-to-point pinout branching terminal housings',
                    'Solid tin-plated braided grounding and shielding harnesses'
                ],
                'application' => 'Wafer handling robotics, SMT chip placers, cleanroom lithography modules.',
                'image' => asset('images/hd/prod_semicon.jpg'),
            ],
            [
                'id' => 'prod-consumer',
                'code' => 'SEIKO-CON-04',
                'name' => 'Audio/Video & Home Appliance Harnesses',
                'category' => 'Consumer',
                'description' => 'Cost-optimized, high-yield wiring interconnects built for international consumer electronics, smart kitchen automation, and audio/video brands.',
                'wireGauge' => '18 – 28 AWG (UL1007 / UL1015 / UL1569)',
                'standard' => 'UL Recognized / RoHS 3',
                'standardColor' => 'bg-amber-50 text-amber-700 border-amber-200/80',
                'connectors' => ['JST VH/XH/RE', 'Molex Mini-Fit', 'TE Connectivity', 'Faston'],
                'tolerances' => 'Automated High-Speed Stripping & Precision Cut Lengths',
                'testing' => '100% automated continuity & miswire prevention testing',
                'specs' => [
                    'UL style approved hook-up wires with color-coded tracing',
                    'Automated high-speed crimping with integrated CFM quality checks',
                    'IDC mass termination and discrete custom connector housings',
                    '100% RoHS 3, REACH, and Halogen-Free compliance'
                ],
                'application' => 'Premium home appliances, kitchen robotics, acoustic systems, consumer smart devices.',
                'image' => asset('images/hd/prod_consumer.jpg'),
            ],
            [
                'id' => 'prod-security',
                'code' => 'SEIKO-SEC-05',
                'name' => 'High-Voltage Scanner & Surveillance Harness',
                'category' => 'Security',
                'description' => 'Ruggedized power and high-speed data transmission harnesses designed for critical infrastructure security checkpoints and surveillance scanners.',
                'wireGauge' => '8 – 20 AWG (High-Dielectric Insulation)',
                'standard' => 'IP67 / UL 94V-0 Rated',
                'standardColor' => 'bg-teal-50 text-teal-700 border-teal-200/80',
                'connectors' => ['Amphenol Industrial', 'Harting Han Modular', 'Phoenix Contact'],
                'tolerances' => 'Ruggedized Overmolding & Heavy Dielectric Spacing',
                'testing' => 'Dielectric withstand testing up to 3,000V AC/DC',
                'specs' => [
                    'High dielectric breakdown resistance insulation barriers',
                    'Heavy-duty multi-core shielded construction with foil and braid',
                    'Oil, ozone, moisture, and abrasion resistant outer polyurethane',
                    'Positive locking metal bayonet connector assemblies'
                ],
                'application' => 'Airport baggage X-ray scanners, perimeter security turnstiles, high-speed CCTV arrays.',
                'image' => asset('images/hd/prod_security.jpg'),
            ],
            [
                'id' => 'prod-aerospace',
                'code' => 'SEIKO-AER-06',
                'name' => 'Aerospace & Mil-Spec Spec Cable Assembly',
                'category' => 'Aerospace',
                'description' => 'Extreme temperature and lightweight shielded assemblies conforming to rigorous aerospace reliability specifications and environmental stress tests.',
                'wireGauge' => '16 – 30 AWG (M22759 / Tefzel ETFE)',
                'standard' => 'MIL-STD-202 / AS9100 Practices',
                'standardColor' => 'bg-purple-50 text-purple-700 border-purple-200/80',
                'connectors' => ['Amphenol D38999 Series III', 'Glenair Micro-D', 'BNC Coaxial'],
                'tolerances' => 'Precision Laced Harnessing / Laser Wire Identification',
                'testing' => 'Thermal cycling (-65°C to +200°C) & high-altitude insulation testing',
                'specs' => [
                    'Tefzel / ETFE high-temp insulation (-65°C to +200°C operational)',
                    'Silver-plated copper high-conductivity lightweight conductors',
                    'Non-outgassing Nomex / Kevlar braided outer mechanical protection',
                    'Laser wire marking and mil-spec crimp pull-force certification'
                ],
                'application' => 'Avionics instrument panels, aircraft cabin power management, radar antenna interconnects.',
                'image' => asset('images/hd/prod_aerospace.jpg'),
            ]
        ];
    }
}
