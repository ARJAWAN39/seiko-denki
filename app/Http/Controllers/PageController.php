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
     * Milestone Page (from seikodenki.com.my)
     */
    public function milestones()
    {
        $milestones = [
            [
                'year' => '2016',
                'title' => 'Semi-Con Turn-Key & Best Supplier Awards',
                'highlights' => [
                    'Start On Semi-Con Box Build Project Turn-Key',
                    'Awarded as BEST SUPPLIER (Harness Category) & Overall Best Supplier',
                    'Appointed as AVL for Air Con Motor Products',
                ],
                'badge' => 'Award & Semi-Con',
            ],
            [
                'year' => '2014 – 2015',
                'title' => 'Plastic Injection Moulding & Automotive Harnesses',
                'highlights' => [
                    'Start Plastic Injection Moulding',
                    'Start Assembly For Bus & Car Harness',
                    'Awarded as BEST SUPPLIER (Harness Category) — 2014',
                    'Appointed as AVL for Consumer Products from UK',
                ],
                'badge' => 'Automotive & Moulding',
            ],
            [
                'year' => '2013',
                'title' => 'ISO 14001 & ISO/TS 16949 Certifications',
                'highlights' => [
                    'Certified ISO 14001: 2004 Environmental Management in April',
                    'Certified ISO/TS 16949: 2009 Automotive Quality Management in August',
                ],
                'badge' => 'Quality & Environment',
            ],
            [
                'year' => '2012',
                'title' => 'Senai Manufacturing Plant Expansion',
                'highlights' => [
                    'Expanded Senai Plant in January with 33,000 sq/ft production space',
                    'Appointed as AVL for Safety Products',
                ],
                'badge' => 'Plant Expansion',
            ],
            [
                'year' => '2011',
                'title' => 'Zero Discrepancy Quality Campaign',
                'highlights' => [
                    'Launched company-wide Quality Campaign: TOWARDS ZERO DISCREPANCY',
                ],
                'badge' => 'Quality Culture',
            ],
            [
                'year' => '2010',
                'title' => 'ISO 9001: 2008 & Global AVL Appointments',
                'highlights' => [
                    'Upgraded and certified ISO 9001: 2008 by Moody International',
                    'Appointed as AVL for Singapore Machinery, Power Supply Products & Speaker System Products',
                ],
                'badge' => 'Global AVL',
            ],
            [
                'year' => '2001 – 2002',
                'title' => 'Japanese Consumer & Automotive Expansion',
                'highlights' => [
                    '2002: Appointed as AVL for Japan Washlet, Printer Products & Coffee Maker Products',
                    '2001: Appointed as AVL for Audio (Automotive), Motor Products & Power Switches',
                ],
                'badge' => 'Consumer & Auto',
            ],
            [
                'year' => '1998 – 1999',
                'title' => 'ISO 9001: 1994 & Medical Product Entry',
                'highlights' => [
                    '1999: Certified ISO 9001: 1994 from Moody International in September',
                    '1999: Appointed as AVL for Weighing Machine',
                    '1998: Appointed as AVL for Medical Product from Japan',
                ],
                'badge' => 'Medical & ISO',
            ],
            [
                'year' => '1991 – 1996',
                'title' => 'Foundation in Johor Bahru',
                'highlights' => [
                    '1991: Seiko Denki (M) Sdn. Bhd. established on 01 March 1991 by Mr. Tatsuyuki Yamamoto in Tebrau 1, Johor Bahru',
                    '1996: Appointed as AVL for regional Audio & Video electronics OEMs',
                ],
                'badge' => 'Foundation',
            ],
        ];

        return view('pages.milestones', compact('milestones'));
    }

    /**
     * Associates Page (from seikodenki.com.my)
     */
    public function associates()
    {
        $associates = [
            [
                'country' => 'Japan',
                'flag' => '🇯🇵',
                'companies' => [
                    [
                        'name' => 'SEIKO DENKI LTD. (KAIBARA)',
                        'address' => '106, Aguta Kaibara-cho, Hikami-Gun, Hyogo, Japan 669-3314',
                        'tel' => '0795-70-2059',
                        'fax' => '0795-70-2059',
                        'email' => 'uno@seikojapan.co.jp',
                        'website' => 'http://www.seikojapan.co.jp',
                    ],
                    [
                        'name' => 'SEIKO DENKI LTD.',
                        'address' => '1062, Uegai Ichijima-cho, Hikami-Gun, Hyogo, Japan 669-4321',
                        'tel' => '0795-85-0201',
                        'fax' => '0795-85-2556',
                        'email' => 'uno@seikojapan.co.jp',
                        'website' => null,
                    ],
                ],
            ],
            [
                'country' => 'Singapore',
                'flag' => '🇸🇬',
                'companies' => [
                    [
                        'name' => 'DA ZHAN MARKETING PTE. LTD.',
                        'address' => '25, Bukit Batok Crescent, The Elitist, #10-09, Singapore 658066',
                        'tel' => null,
                        'fax' => null,
                        'email' => null,
                        'contact' => 'Seiko Denki (M) Sdn. Bhd., Johor Bahru',
                        'website' => null,
                    ],
                ],
            ],
            [
                'country' => 'China',
                'flag' => '🇨🇳',
                'companies' => [
                    [
                        'name' => 'TOP ZONE (CHINA) CORP. LTD.',
                        'address' => 'Feng Gang Town, Dong Guan City, Guang Dong, China',
                        'tel' => '0769-87568781',
                        'fax' => '0769-87568782',
                        'email' => 'eric_chan@seikojapan.co.jp',
                        'website' => null,
                    ],
                ],
            ],
            [
                'country' => 'Vietnam',
                'flag' => '🇻🇳',
                'companies' => [
                    [
                        'name' => 'NGHIEP PHAT TRADING CO. LTD',
                        'address' => '240A Duong Dinh Hoi - P. Tang Nhon Phu B, Q.9, TP Ho Chi Minh, Vietnam',
                        'tel' => null,
                        'fax' => null,
                        'email' => null,
                        'website' => null,
                    ],
                ],
            ],
        ];

        return view('pages.associates', compact('associates'));
    }

    /**
     * Our Team Page (from seikodenki.com.my)
     */
    public function ourTeam()
    {
        $teamCategories = [
            [
                'title' => 'Management & Engineering Leadership',
                'subtitle' => 'Experienced technical and operations leaders driving Japanese quality standards across Tebrau and Senai plants.',
                'image' => asset('images/real/seiko_team_management.png'),
                'tag' => 'Leadership',
            ],
            [
                'title' => 'Staff Assembly & Production Floor',
                'subtitle' => 'Skilled wire harness technicians executing full-scale formboard routing, crimping, and point-to-point assembly.',
                'image' => asset('images/real/seiko_formboard_assembly.jpg'),
                'tag' => 'Staff Assembly',
            ],
            [
                'title' => 'Cleanroom Inspection & Task Lighting',
                'subtitle' => 'Dedicated visual quality assurance specialists performing 100% termination and connector integrity checks.',
                'image' => asset('images/real/seiko_assembly_operator.png'),
                'tag' => 'Quality Team',
            ],
            [
                'title' => 'Optical Metrology & Testing Specialists',
                'subtitle' => 'QA technicians operating PMX-150 digital optical measuring microscopes and continuity testing benches.',
                'image' => asset('images/real/seiko_pmx150_optical.png'),
                'tag' => 'Metrology Team',
            ],
            [
                'title' => 'Automotive & Complex Harness Engineers',
                'subtitle' => 'Technical specialists validating multi-branch automotive and industrial harness looms on test boards.',
                'image' => asset('images/real/seiko_automotive_loom.jpg'),
                'tag' => 'Engineering',
            ],
        ];

        return view('pages.our-team', compact('teamCategories'));
    }

    /**
     * Career Page (from seikodenki.com.my/career/)
     */
    public function career()
    {
        $jobs = [
            [
                'title' => 'Senior Shipping Executive',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'department' => 'Logistics & Supply Chain',
                'summary' => 'Manage import/export documentation, customs clearance, freight coordination, and timely overseas customer deliveries.',
            ],
            [
                'title' => 'Project Executive',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'department' => 'Engineering & NPI',
                'summary' => 'Coordinate new wire harness NPI transfers, customer BOM validation, sample builds, and engineering change notices.',
            ],
            [
                'title' => 'PROJECT MANAGER',
                'level' => 'Manager',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'department' => 'Engineering & Operations',
                'summary' => 'Lead cross-functional OEM customer programs from prototyping through mass production across Tebrau and Senai.',
            ],
            [
                'title' => 'Sales Executive',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'department' => 'Sales & Marketing',
                'summary' => 'Develop B2B OEM accounts, prepare RFQ quotations, and maintain strong regional client relationships.',
            ],
            [
                'title' => 'SALES MANAGER',
                'level' => 'Manager',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'department' => 'Sales & Marketing',
                'summary' => 'Drive revenue growth across automotive, medical, semiconductor, and industrial wire harness sectors.',
            ],
            [
                'title' => 'Planning Senior Executive / Junior',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'department' => 'Production Planning (PPC)',
                'summary' => 'Plan daily production schedules, material MRP allocation, and FIFO warehouse stock control.',
            ],
            [
                'title' => 'Junior Purchasing',
                'level' => 'Non-Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'department' => 'Procurement',
                'summary' => 'Source UL wires, terminals, and connectors from approved vendors while ensuring cost and delivery targets.',
            ],
            [
                'title' => 'Executive / Assistant Manager / Manager Marketing Sales',
                'level' => 'Executive – Manager',
                'type' => 'Full-Time',
                'location' => 'Johor, Singapore',
                'department' => 'Regional Business Development',
                'summary' => 'Expand key account partnerships across Malaysia and Singapore electronics and industrial manufacturing hubs.',
            ],
            [
                'title' => 'Accounts Internship',
                'level' => 'Fresh / Entry Level',
                'type' => 'Internship',
                'location' => 'Johor',
                'department' => 'Finance & Accounts',
                'summary' => 'Hands-on training in AP/AR ledger entries, invoicing, and manufacturing cost accounting.',
            ],
            [
                'title' => 'IT Technician Internship (Software & Hardware)',
                'level' => 'Fresh / Entry Level',
                'type' => 'Internship',
                'location' => 'Johor, Other',
                'department' => 'Information Technology',
                'summary' => 'Support plant network infrastructure, workstations, ERP/office systems, and internal web tools.',
            ],
            [
                'title' => 'Internship Production',
                'level' => 'Fresh / Entry Level',
                'type' => 'Internship',
                'location' => 'Johor',
                'department' => 'Manufacturing Operations',
                'summary' => 'Gain practical industrial engineering exposure on wire harness production lines, QA testing, and lean workflows.',
            ],
        ];

        return view('pages.career', compact('jobs'));
    }

    /**
     * Facilities Tour Page (Matched to Old Website: Photo Gallery, Company Videos, Download)
     */
    public function facilities()
    {
        $photoAlbums = [
            [
                'title' => 'Wire Harness',
                'count' => 5,
                'desc' => 'Custom automotive, medical, and industrial wire harness assemblies built to IPC/WHMA-A-620 standards.',
                'image' => asset('images/real/seiko_automotive_loom.jpg'),
            ],
            [
                'title' => 'Wire Cutting',
                'count' => 2,
                'desc' => 'Automated high-speed wire cutting, stripping, and roller straightening precision units.',
                'image' => asset('images/real/seiko_wire_stripper.png'),
            ],
            [
                'title' => 'Process Soldering',
                'count' => 4,
                'desc' => 'Controlled precision soldering, tinning, and jig-mounted connector termination stations.',
                'image' => asset('images/real/seiko_jig_fixture.jpg'),
            ],
            [
                'title' => 'New Project — Security, Medical & Consumer',
                'count' => 12,
                'desc' => 'Turn-key wire harness and sub-assembly lines for medical, security, and consumer electronics.',
                'image' => asset('images/real/seiko_outgoing_inspection.png'),
            ],
            [
                'title' => 'Tester & Metrology',
                'count' => 1,
                'desc' => 'PMX-150 digital optical measuring microscope and 100% computerized continuity testing jigs.',
                'image' => asset('images/real/seiko_pmx150_optical.png'),
            ],
            [
                'title' => 'Machine & Cleanroom Line',
                'count' => 19,
                'desc' => 'Dedicated crimping presses, ultrasonic splicers, and task-lit cleanroom inspection benches.',
                'image' => asset('images/real/seiko_assembly_operator.png'),
            ],
            [
                'title' => 'Layout & Formboard',
                'count' => 11,
                'desc' => 'Full-scale industrial pegboard and harness routing layouts across our Tebrau & Senai plants.',
                'image' => asset('images/real/seiko_formboard_assembly.jpg'),
            ],
        ];

        $videos = [
            [
                'title' => 'Seiko Denki (M) Sdn. Bhd. — Corporate & Factory Overview',
                'category' => 'General',
                'youtubeId' => '8GBmyn7jYVc',
                'url' => 'https://www.youtube.com/watch?v=8GBmyn7jYVc',
                'desc' => 'Inside our Johor Bahru manufacturing operations, automated wire processing, and quality assurance workflows.',
            ],
        ];

        $downloads = [
            [
                'title' => 'ISO 9001 Certificate — Seiko Denki (M) Sdn. Bhd.',
                'category' => 'Quality Certification',
                'format' => 'PDF Document',
                'desc' => 'Official ISO 9001 Quality Management System certification document for wire harness manufacturing.',
                'url' => route('achievements'),
            ],
            [
                'title' => 'RoHS 3 & REACH Compliance Statement',
                'category' => 'Environmental Compliance',
                'format' => 'Compliance Guide',
                'desc' => 'Material declaration and hazardous substance restriction compliance documentation.',
                'url' => route('achievements'),
            ],
        ];

        return view('pages.facilities', compact('photoAlbums', 'videos', 'downloads'));
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
     * Achievements Dataset (Official Certificates & Awards)
     */
    private function getAchievements(): array
    {
        return [
            [
                'id' => 'iatf-16949',
                'type' => 'certificate',
                'title' => 'IATF 16949 : 2016 Automotive Quality Management',
                'issuer' => 'AFNOR Certification (AFAQ)',
                'year' => 'No. IATF: 0473028',
                'code' => 'IATF 16949',
                'description' => 'International automotive standard for Manufacturing of Wire Harnesses at Senai Phase 3 (UBI: 9GLX3SZ).',
                'badge' => 'Automotive Gold Standard',
                'image' => asset('images/achievements/cert_iatf_16949.jpg'),
            ],
            [
                'id' => 'iso-13485',
                'type' => 'certificate',
                'title' => 'ISO 13485 : 2016 Medical Devices Quality System',
                'issuer' => 'Bureau Veritas Certification',
                'year' => 'Valid until Sept 2027',
                'code' => 'MY.740332',
                'description' => 'Manufacture and Assembly of Electrical Wire Harness for Medical Devices (Certificate No. MY.740332).',
                'badge' => 'Medical Device Standard',
                'image' => asset('images/achievements/cert_iso_13485.jpg'),
            ],
            [
                'id' => 'iso-9001',
                'type' => 'certificate',
                'title' => 'ISO 9001 : 2015 Quality Management Systems',
                'issuer' => 'AFNOR Certification (AFAQ)',
                'year' => 'N° 2023/104338.1',
                'code' => 'ISO 9001',
                'description' => 'Manufacturing of Wire Harnesses and Over Moulding across both Senai 3 and Tebrau 1 facilities.',
                'badge' => 'Core Quality System',
                'image' => asset('images/achievements/cert_iso_9001.jpg'),
            ],
            [
                'id' => 'iso-14001',
                'type' => 'certificate',
                'title' => 'ISO 14001 : 2015 Environmental Management',
                'issuer' => 'AFNOR Certification (AFAQ)',
                'year' => '2026 – 2029',
                'code' => 'N° 2023/103261.2',
                'description' => 'Certified environmental management system for Manufacture of Wire Harnesses and Over Moulding across Senai 3 & Tebrau 1.',
                'badge' => 'Environmental ISO',
                'image' => asset('images/achievements/cert_iso_14001.jpg'),
            ],
            [
                'id' => 'ipc-whma-620',
                'type' => 'certificate',
                'title' => 'IPC/WHMA-A-620 Certified IPC Trainer (CIT)',
                'issuer' => 'IPC Certification Program',
                'year' => 'Valid until Dec 2026',
                'code' => 'A620T-24120553038',
                'description' => 'Official Certified IPC Trainer qualification for Requirements and Acceptance for Cable and Wire Harness Assemblies.',
                'badge' => 'IPC-A-620 Trainer',
                'image' => asset('images/achievements/cert_ipc_620.jpg'),
            ],
            [
                'id' => 'award-golden-bull-trophy',
                'type' => 'award',
                'title' => 'Golden Bull Award — Outstanding SME',
                'issuer' => 'Golden Bull Award Malaysia',
                'year' => 'Outstanding SME',
                'code' => 'GOLDEN BULL',
                'description' => 'Prestigious national business award recognizing Seiko Denki (M) Sdn. Bhd. for sustained growth, engineering quality, and industry leadership.',
                'badge' => 'Outstanding SME',
                'image' => asset('images/achievements/award_golden_bull_trophy.jpg'),
            ],
            [
                'id' => 'award-golden-bull-stage',
                'type' => 'award',
                'title' => 'Golden Bull Award Gala Stage Presentation',
                'issuer' => 'Golden Bull Award (#GBA)',
                'year' => 'Gala Ceremony',
                'code' => 'GBA HONORS',
                'description' => 'Seiko Denki leadership receiving the Outstanding SME Golden Bull Award trophy on the national awards stage.',
                'badge' => 'National Recognition',
                'image' => asset('images/achievements/award_golden_bull_stage.jpg'),
            ],
            [
                'id' => 'award-crystal-trophies',
                'type' => 'award',
                'title' => 'TOYO Overall Sales Highest Award & Dynon Honors',
                'issuer' => 'TOYO / Dynon / OEM Partners',
                'year' => 'OEM Excellence',
                'code' => 'BEST SUPPLIER',
                'description' => 'Crystal excellence trophies awarded by global partners including TOYO (Overall Sales Highest Award) and Dynon.',
                'badge' => 'Supplier Excellence',
                'image' => asset('images/achievements/award_crystal_trophies.jpg'),
            ],
            [
                'id' => 'award-framed-certificates',
                'type' => 'award',
                'title' => 'Panasonic, TOYO & Best Supplier Appreciation Awards',
                'issuer' => 'Global OEM Clients',
                'year' => 'Multi-Year Honors',
                'code' => 'OEM APPRECIATION',
                'description' => 'Framed certificates of appreciation and Best Supplier Awards from Panasonic, TOYO Electric, and automotive partners.',
                'badge' => 'Partner Honors',
                'image' => asset('images/achievements/award_framed_certificates.jpg'),
            ],
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
                'title' => 'Seiko Denki (M) Sdn. Bhd. Honored as Outstanding SME at the Golden Bull Award',
                'date' => 'Gala Awards',
                'category' => 'Corporate Recognition',
                'summary' => 'Seiko Denki (M) Sdn. Bhd. was proudly presented with the Golden Bull Award for Outstanding SME, recognizing over three decades of wire harness manufacturing excellence.',
                'image' => asset('images/achievements/award_golden_bull_stage.jpg'),
            ],
            [
                'id' => 'news-2',
                'title' => 'Leadership Team Attends #GBA Golden Bull Award Gala Ceremony',
                'date' => 'Corporate Event',
                'category' => 'Leadership & Gala',
                'summary' => 'Our executive management and engineering leadership represented Seiko Denki at the prestigious Golden Bull Award business gala dinner.',
                'image' => asset('images/achievements/event_gba_gala.jpg'),
            ],
            [
                'id' => 'news-3',
                'title' => 'ISO 14001:2015 Environmental Management Certification Renewed Through 2029',
                'date' => '2026 – 2029',
                'category' => 'Quality & ESG',
                'summary' => 'AFNOR Certification officially validated Seiko Denki’s ISO 14001:2015 Environmental Management System across both our Senai 3 and Tebrau 1 plants.',
                'image' => asset('images/achievements/cert_iso_14001.jpg'),
            ],
            [
                'id' => 'news-4',
                'title' => 'OEM Supplier Excellence: TOYO & Dynon Recognition Trophies',
                'date' => 'Partner Milestone',
                'category' => 'Client Recognition',
                'summary' => 'Recognized by international OEM clients for consistent quality, on-time delivery, and high-reliability wire harness engineering.',
                'image' => asset('images/achievements/award_crystal_trophies.jpg'),
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
