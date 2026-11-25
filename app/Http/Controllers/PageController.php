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

        $categories = ['All', 'Aircon Motor', 'Automotive', 'Consumer', 'Industrial Equipment', 'Medical', 'Security', 'Semi-Con'];

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
     * Our Team Page (Mirrored from seikodenki.com.my/gallery/group/2800/cat/9250/)
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
        ];

        $teamGallery = [];
        for ($i = 1; $i <= 12; $i++) {
            $teamGallery[] = [
                'title' => 'Seiko Denki Staff Assembly & Team Activity #' . $i,
                'image' => asset("images/old_site/team/team_{$i}.jpg"),
                'tag' => 'Staff Assembly',
            ];
        }

        return view('pages.our-team', compact('teamCategories', 'teamGallery'));
    }

    /**
     * Career Page (Mirrored from seikodenki.com.my/career/ with full Job Details)
     */
    public function career($id = null)
    {
        $jobs = [
            [
                'id' => '7891',
                'title' => 'Senior Shipping Executive',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'specialization' => 'Manufacturing/Production Operations',
                'ageRange' => '35 - 45',
                'experience' => '5',
                'salary' => 'MYR4000 - MYR4500',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Manage and coordinate import/export shipping, customs declarations (HS code, LMW, ATIGA), and logistics operations.',
                'responsibilities' => [
                    'Oversee end-to-end shipping processes for import and export operations.',
                    'Prepare and verify all relevant shipping documentation, including commercial invoices, packing lists, delivery orders, and customs declarations.',
                    'Coordinate closely with freight forwarders, customs agents, transporters, and internal departments to ensure smooth logistics operations.',
                    'Monitor shipment schedules and provide regular updates to internal stakeholders and customers.',
                    'Ensure compliance with international shipping regulations, customs requirements, and Incoterms.',
                    'Track and manage logistics costs, verify freight and shipping invoices, and support cost control initiatives.',
                    'Resolve any shipping-related issues or delays promptly and effectively.',
                    'Maintain accurate records of shipping activities and documents for audit and reporting purposes.',
                    'Collaborate with warehouse and inventory teams to ensure accurate inbound and outbound movements.',
                ],
                'requirements' => [
                    'Candidate must possess at least a Diploma / Certificate in Logistic Operation, Supply Chain Management or related disciplines.',
                    'Minimum 2 years of experience in handling logistic operation in a manufacturing environment.',
                    'Familiar with Customs HS code, duty tax computation and exemption, LMW license renewal, Sub-con application and renewal, ATIGA and other Customs regulations.',
                    'Ability to deal with relevant government agencies, inclusive of Customs authorities.',
                    'Preferably have working experience with ERP system.',
                ],
            ],
            [
                'id' => '7834',
                'title' => 'Project Executive',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'specialization' => 'Manufacturing/Production Operations',
                'ageRange' => '-',
                'experience' => '0',
                'salary' => '-',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Collect and analyze costing data, assist the Project Manager in quotation, sourcing, execution, and project milestones.',
                'responsibilities' => [
                    'Collect, analyse and report on costing data including standard cost reports, customer pricing, and cost comparisons.',
                    'Assist Project Manager in quotation, sourcing, executing, and ensuring project completion within time, scope and budget.',
                    'Coordinate and liaise with customers, vendors, and authorities for project submission and approval.',
                    'Monitor work progress as per project milestones and conformance to relevant specifications and standards.',
                    'Assist in preparing progress reports, action plans, and taking minutes of meetings.',
                    'Maintain accurate project documentation records and filing system including correspondence and drawings.',
                ],
                'requirements' => [
                    'Graduation / Diploma in business management or relevant field.',
                    'At least 2 years of working experience.',
                    'Able to work independently and efficiently.',
                    'Strong communicator, both verbal and written.',
                    'Willing to travel to site.',
                ],
            ],
            [
                'id' => '7833',
                'title' => 'PROJECT MANAGER',
                'level' => 'Manager',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'specialization' => 'Manufacturing/Production Operations',
                'ageRange' => '-',
                'experience' => '0',
                'salary' => '-',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Plan, control, and oversee supply chain, project budgets, vendor SOWs, and cross-functional OEM delivery milestones.',
                'responsibilities' => [
                    'Work with project team to develop the project plan, quotation, business case and identify vendor sourcing.',
                    'Monitor status and progress against plans, schedule variances, and mitigation plans.',
                    'Review and manage all project issues, changes, risks, and project budget forecasts.',
                    'Manage vendor relationships during project lifecycle including Statements of Work (SOW).',
                    'Drive the project team to deliver the project and associated benefits with clear communication across departments.',
                ],
                'requirements' => [
                    'Proven working experience in project/sales management.',
                    'Excellent customer-facing and internal written/verbal communication skills.',
                    'Solid organizational skills including attention to detail and multitasking.',
                    'Strong working knowledge of Microsoft Office and analytical skills.',
                    'Proven ability to complete projects according to outlined scope, budget, and timeline.',
                ],
            ],
            [
                'id' => '7832',
                'title' => 'Sales Executive',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'specialization' => 'Manufacturing/Production Operations',
                'ageRange' => '-',
                'experience' => '0',
                'salary' => '-',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Support customer scheduling, demand & order fulfilment, and coordinate with Operations, Procurement, and Logistics.',
                'responsibilities' => [
                    'Responsible for customer scheduling, demand & order fulfilment.',
                    'Provide short-term and long-term demand requirements to factories and suppliers to secure capacity and materials.',
                    'Identify and coordinate with Operation, Procurement, and contract manufacturers to resolve capacity bottlenecks and supply risks.',
                    'Work closely with Logistics team for shipment arrangements and Excess & Obsolete claims validation.',
                    'Establish and communicate feasible production schedules meeting customer requirements.',
                ],
                'requirements' => [
                    'Graduation / Diploma in business management or relevant field.',
                    'At least 2 years of experience in CSS / Customer Service.',
                    'Exceptional sales, customer service, negotiation, and presentation skills.',
                    'Proficiency in CRM, Microsoft Office and software.',
                ],
            ],
            [
                'id' => '7831',
                'title' => 'SALES MANAGER',
                'level' => 'Manager',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'specialization' => 'Manufacturing/Production Operations',
                'ageRange' => '-',
                'experience' => '5',
                'salary' => '-',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Collect, analyse, and report on costing data, sub-contractor pricing, product costing analysis, and budgeting.',
                'responsibilities' => [
                    'Collect, analyse and report on costing data including standard cost reports and product costing analysis.',
                    'Monitor sub-contractor pricing, cost comparisons, and track variances.',
                    'Collaborate with other departments to ensure accurate budgeting and processes.',
                ],
                'requirements' => [
                    'Graduation / Diploma in business management or relevant field.',
                    'At least 2 years of working experience or Fresh Graduate (with procurement/costing/project exposure).',
                    'Able to work independently on tight deadlines and willing to travel to site.',
                    'Strong communicator with Microsoft Office skills (Excel, Word, PowerPoint).',
                ],
            ],
            [
                'id' => '7565',
                'title' => 'Planning Senior Executive/Junior',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'specialization' => 'Manufacturing/Production Operations',
                'ageRange' => '25 - 32',
                'experience' => '5',
                'salary' => 'MYR2500 - MYR3000',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Plan wire harness production schedules, align capacity with customer demand, and coordinate MRP material availability.',
                'responsibilities' => [
                    'Develop and maintain comprehensive production schedules based on sales forecasts, customer orders, and internal capacity.',
                    'Work closely with procurement to ensure raw materials and wire harness components are available at the right time.',
                    'Conduct capacity analysis to identify bottlenecks and optimize equipment, manpower, and resources.',
                    'Communicate production plans across engineering, QC, procurement, and sales; prepare status reports for management.',
                    'Implement lean manufacturing principles to reduce lead times and minimize waste.',
                ],
                'requirements' => [
                    "Bachelor's Degree / Post Graduate Diploma / Professional Degree in relevant discipline.",
                    'Experience in manufacturing production planning, scheduling, and inventory control.',
                    'Strong analytical and cross-department coordination skills.',
                ],
            ],
            [
                'id' => '7564',
                'title' => 'Junior Purchasing',
                'level' => 'Non-Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'specialization' => 'Purchasing/Inventory/Material & Warehouse Management',
                'ageRange' => '25 - 32',
                'experience' => '5',
                'salary' => 'MYR2000 - MYR2500',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Assist in procurement activities, supplier evaluation, purchase order issuance, and inventory data management.',
                'responsibilities' => [
                    'Assist in Procurement Activities: Support in sourcing and evaluating suppliers based on price, quality, and delivery reliability.',
                    'Prepare and issue purchase orders under the guidance of the Purchasing Manager.',
                    'Data Management: Maintain accurate records of purchases, pricing, and supplier information.',
                    'Assist in monitoring inventory levels and generating purchase requisitions when needed.',
                ],
                'requirements' => [
                    'Vendor Coordination: Communicate with suppliers to follow up on orders, resolve issues, and ensure timely delivery.',
                    'Assist in building and maintaining positive supplier relationships.',
                    'Support Cost-Saving Initiatives: Research potential vendors and recommend cost-effective alternatives.',
                    'Assist in analyzing procurement data to identify trends and areas for improvement.',
                    'Administrative Support: Help in preparing reports, presentations, and documentation for procurement meetings.',
                ],
            ],
            [
                'id' => '7563',
                'title' => 'Accounts Internship',
                'level' => 'Fresh/Entry Level',
                'type' => 'Internship',
                'location' => 'Johor',
                'specialization' => 'Finance - General/Cost Accounting',
                'ageRange' => '21 - 25',
                'experience' => '0',
                'salary' => 'MYR1200 - MYR1200',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Perform Accounts Payable functions, maintain purchase/payment records, and reconcile invoices against PO/DO.',
                'responsibilities' => [
                    'Perform Accounts Payable function and administrative support for Account team.',
                    'Maintain daily purchase records and payment records into the accounting system.',
                    'Maintain soft copies of accounting documents into the company server.',
                ],
                'requirements' => [
                    'Reconciliation of purchase invoice against Purchase Order and Delivery Order.',
                    'Reconciliation of purchase invoice against Statement of Account.',
                    'Please email to Ms. Piriya: Human Resources (piriya@seikodenki.com).',
                ],
            ],
            [
                'id' => '7206',
                'title' => 'IT Technician Internship (Software & Hardware)',
                'level' => 'Fresh/Entry Level',
                'type' => 'Internship',
                'location' => 'Johor, Other (senai)',
                'specialization' => 'IT/Computer - Network/System/Database Admin',
                'ageRange' => '-',
                'experience' => '0',
                'salary' => 'MYR1200 - MYR1200',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Install, maintain, and troubleshoot plant computer systems, networks, software applications, and hardware.',
                'responsibilities' => [
                    'Install, configure, and maintain computer hardware, software, and networks (LAN/WAN).',
                    'Diagnose and resolve technical issues related to desktops, laptops, printers, and IT equipment.',
                    'Perform system updates, software patches, security upgrades, and user account management.',
                    'Assist in IT asset management, data backup, recovery, and technical documentation.',
                ],
                'requirements' => [
                    'Diploma/Degree in IT, Computer Science, or related field (Prefer Male Candidate).',
                    'Strong knowledge of Windows, macOS, and Linux operating systems.',
                    'Experience with hardware troubleshooting, network configuration, and cybersecurity best practices.',
                ],
            ],
            [
                'id' => '7104',
                'title' => 'Executive Manager Marketing Sales',
                'level' => 'Senior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor, Singapore',
                'specialization' => 'Marketing/Business Development',
                'ageRange' => '-',
                'experience' => '0',
                'salary' => 'MYR5500 - MYR6500',
                'qualification' => "Diploma/Advanced/Higher/Graduate Diploma , Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Drive B2B sales, marketing strategies, and customer relationship management across Malaysia and Singapore.',
                'responsibilities' => [
                    'Responsible for customer relationship management, demand generation, and order fulfillment across Malaysia and Singapore.',
                    'Develop and execute short-term and long-term marketing strategies to drive demand.',
                    'Coordinate with sales, Logistics, Operations, and Product Development teams to ensure timely delivery.',
                    'Analyze sales data and market feedback from Malaysia and Singapore to optimize sales outcomes.',
                ],
                'requirements' => [
                    'Diploma / Bachelor’s Degree in Marketing, Business Development, or related field.',
                    'Benefits: Phone allowance, transport allowance, and company mobile provided.',
                ],
            ],
            [
                'id' => '7103',
                'title' => 'Assistant Manager Marketing Sales',
                'level' => 'Manager',
                'type' => 'Full-Time',
                'location' => 'Johor, Singapore',
                'specialization' => 'Marketing/Business Development',
                'ageRange' => '-',
                'experience' => '5',
                'salary' => 'MYR6500 - MYR7500',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree , Master's Degree",
                'summary' => 'Lead regional marketing campaigns, customer demand generation, and sales growth across Malaysia and Singapore.',
                'responsibilities' => [
                    'Manage customer relationship management, demand generation, and order fulfillment across Malaysia and Singapore.',
                    'Develop and execute marketing strategies aligned with sales plans and revenue targets.',
                    'Collaborate with Product Development, Operations, and Procurement to align product availability.',
                    'Analyze regional sales data and market feedback to recommend strategic adjustments.',
                ],
                'requirements' => [
                    'Bachelor’s or Master’s Degree with minimum 5 years of experience in B2B sales/marketing.',
                    'Benefits: Phone allowance, transport allowance, and company mobile provided.',
                ],
            ],
            [
                'id' => '7102',
                'title' => 'Manager Marketing Sales',
                'level' => 'Manager',
                'type' => 'Full-Time',
                'location' => 'Johor, Singapore',
                'specialization' => 'Manufacturing/Production Operations',
                'ageRange' => '-',
                'experience' => '0',
                'salary' => 'MYR7500 - MYR8500',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree , Master's Degree",
                'summary' => 'Oversee overall Malaysia & Singapore sales and marketing strategy, key OEM accounts, and regional expansion.',
                'responsibilities' => [
                    'Oversee customer relationship management, demand generation, and order fulfillment across Malaysia and Singapore.',
                    'Lead short-term and long-term marketing strategies and align cross-functional teams to achieve sales targets.',
                    'Identify market trends and growth opportunities in Malaysia and Singapore.',
                ],
                'requirements' => [
                    'Bachelor’s or Master’s Degree in Business, Marketing, or Engineering.',
                    'Benefits: Phone allowance, transport allowance, and company mobile provided.',
                ],
            ],
            [
                'id' => '6357',
                'title' => 'Internship Production',
                'level' => 'Fresh/Entry Level',
                'type' => 'Internship',
                'location' => 'Johor (senai)',
                'specialization' => 'Marketing/Business Development',
                'ageRange' => '-',
                'experience' => '0',
                'salary' => 'MYR1200',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Hands-on experience in production scheduling, equipment setup, quality control, and lean manufacturing at Senai.',
                'responsibilities' => [
                    'Assist in coordinating and monitoring production schedules to ensure timely execution of projects.',
                    'Participate in preparation and setup of production equipment and materials.',
                    'Contribute to quality control processes by inspecting products for defects and tracking inventory levels.',
                    'Support documentation of production processes and troubleshoot minor technical issues.',
                ],
                'requirements' => [
                    'Currently enrolled in Industrial Engineering, Manufacturing, Operations Management, or related degree.',
                    'Duration: 3 or 6 months (Day shift, Monday to Friday in Senai; dental & health insurance benefits).',
                ],
            ],
            [
                'id' => '6356',
                'title' => 'Internship QA',
                'level' => 'Fresh/Entry Level',
                'type' => 'Internship',
                'location' => 'Johor (senai)',
                'specialization' => 'Quality Control/Assurance',
                'ageRange' => '-',
                'experience' => '0',
                'salary' => 'MYR1200',
                'qualification' => 'Diploma/Advanced/Higher/Graduate Diploma',
                'summary' => 'Collaborate with QA team on test plans, defect tracking, testing documentation, and quality verification at Senai.',
                'responsibilities' => [
                    'Collaborate with the QA team to understand product requirements and specifications.',
                    'Participate in the development of test plans, test cases, and test scripts.',
                    'Identify, report, and track defects and inconsistencies; maintain testing documentation.',
                    'Assist in maintaining and enhancing QA test environments.',
                ],
                'requirements' => [
                    'Currently enrolled in Computer Science, Engineering, IT, or Quality Assurance related program.',
                    'Duration: 3 or 6 months (Monday to Friday in Senai; dental & health insurance benefits).',
                ],
            ],
            [
                'id' => '6216',
                'title' => 'Sales Executive',
                'level' => 'Junior Executive',
                'type' => 'Full-Time',
                'location' => 'Johor',
                'specialization' => 'Customer Service',
                'ageRange' => '28 - 35',
                'experience' => '0',
                'salary' => 'MYR2500 - MYR3000',
                'qualification' => "Bachelor's Degree/Post Graduate Diploma/Professional Degree",
                'summary' => 'Identify sales opportunities, build client relationships, conduct product presentations, and prepare sales forecasts.',
                'responsibilities' => [
                    'Identify and pursue sales opportunities by researching and targeting potential clients/customers.',
                    'Build and maintain relationships with existing and potential clients.',
                    'Conduct sales presentations, negotiate contracts/pricing, and achieve sales targets.',
                    'Prepare sales reports and forecasts and collaborate with marketing and customer support.',
                ],
                'requirements' => [
                    'Proven experience as a sales executive or Bachelor’s degree in business, marketing, or related field.',
                    'Excellent communication, negotiation, and CRM skills (prefer female candidates).',
                ],
            ],
        ];

        return view('pages.career', [
            'jobs' => $jobs,
            'selectedJobId' => $id,
        ]);
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
                'image' => asset('images/real/seiko_wire_harness_board.jpg'),
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
     * Events & News Dataset (Mirrored from seikodenki.com.my/latestnews/ + Latest Corporate Events)
     */
    private function getNews(): array
    {
        return [
            [
                'id' => 'news-gba-2019',
                'title' => 'Golden Bull Award 2019',
                'date' => '2019',
                'category' => 'Corporate Event',
                'summary' => 'Celebrating business achievements at the Golden Bull Award 2019.',
                'image' => asset('images/achievements/event_gba_gala.jpg'),
            ],
            [
                'id' => 'news-iftar',
                'title' => 'Seiko Denki Team Iftar Celebration',
                'date' => 'Team Gathering',
                'category' => 'Team Event',
                'summary' => 'A memorable Iftar celebration with the Seiko Denki team, sharing blessings and joyful moments.',
                'image' => asset('images/old_site/events/event_iftar.jpg'),
            ],
            [
                'id' => 'news-1',
                'title' => 'Happy Deepavali!',
                'date' => '06 Nov 2026',
                'category' => 'Event',
                'summary' => 'Wishing our employees, clients, and partners a joyful and prosperous Festival of Lights from Seiko Denki (M) Sdn. Bhd.',
                'image' => asset('images/old_site/events/event_1.png'),
            ],
            [
                'id' => 'news-2',
                'title' => 'Selamat Hari Raya Aidilfitri !',
                'date' => '12 Mar 2026',
                'category' => 'Event',
                'summary' => 'Selamat Hari Raya Aidilfitri, Maaf Zahir dan Batin from the management and team at Seiko Denki (M) Sdn. Bhd.',
                'image' => asset('images/old_site/events/event_2.png'),
            ],
            [
                'id' => 'news-3',
                'title' => 'Merry Christmas!!',
                'date' => '18 Dec 2025',
                'category' => 'Event',
                'summary' => 'Warmest season’s greetings and best wishes for the New Year to all our valued OEM partners and staff.',
                'image' => asset('images/old_site/events/event_3.png'),
            ],
            [
                'id' => 'news-4',
                'title' => 'Happy Deepavali !',
                'date' => '13 Oct 2025',
                'category' => 'Event',
                'summary' => 'Celebrating unity, harmony, and bright beginnings with our Seiko Denki family across Johor Bahru.',
                'image' => asset('images/old_site/events/event_4.png'),
            ],
            [
                'id' => 'news-5',
                'title' => 'Happy Independence Day!',
                'date' => '27 Aug 2025',
                'category' => 'Event',
                'summary' => 'Selamat Hari Merdeka! Proudly manufacturing precision wire harnesses in Johor, Malaysia since 1991.',
                'image' => asset('images/old_site/events/event_5.png'),
            ],
            [
                'id' => 'news-6',
                'title' => 'Happy Labour Day',
                'date' => '30 Apr 2025',
                'category' => 'Event',
                'summary' => 'Appreciating the dedication, craftsmanship, and teamwork of every Seiko Denki employee.',
                'image' => asset('images/old_site/events/event_6.png'),
            ],
        ];
    }

    /**
     * Products Dataset (Mirrored from seikodenki.com.my/category/)
     */
    private function getProducts(): array
    {
        return [
            [
                'id' => 'prod-aircon',
                'code' => 'SEIKO-AIR-01',
                'name' => 'Aircon Motor Wire Harness',
                'category' => 'Aircon Motor',
                'description' => 'Precision motor lead wire harnesses engineered for HVAC blowers, inverter air-conditioning compressors, and thermal control units.',
                'wireGauge' => '16 – 24 AWG (UL1015 / UL3266)',
                'standard' => 'UL Recognized / RoHS 3',
                'standardColor' => 'bg-cyan-50 text-cyan-700 border-cyan-200/80',
                'connectors' => ['JST VH/XH', 'Molex', 'TE Faston', 'Waterproof Seal'],
                'tolerances' => '±1.0mm Length / Automated CFM Monitored',
                'testing' => '100% Continuity & High-Voltage Insulation Testing',
                'specs' => [
                    'High-temperature resistant PVC & XLPE motor lead insulation',
                    'Vibration-resistant crimped ring & flag terminals',
                    'Custom heat-shrink strain relief sleeving',
                    'RoHS 3 & REACH compliant materials'
                ],
                'application' => 'Air conditioner fan motors, HVAC blower modules, inverter compressors.',
                'image' => asset('images/old_site/products/prod_aircon.png'),
            ],
            [
                'id' => 'prod-auto',
                'code' => 'SEIKO-AUT-02',
                'name' => 'Automotive Wire Harness',
                'category' => 'Automotive',
                'description' => 'Custom engineered car wire harnesses and commercial bus cables built to strict IATF 16949 automotive quality standards.',
                'wireGauge' => '12 – 28 AWG (AVSS / XLPE)',
                'standard' => 'IATF 16949:2016',
                'standardColor' => 'bg-red-50 text-red-700 border-red-200/80',
                'connectors' => ['Yazaki', 'Sumitomo', 'TE Connectivity', 'Deutsch IP68'],
                'tolerances' => '±1.0mm Length / CFM Real-Time Monitored',
                'testing' => '100% Electrical Continuity & Pull-Force Verified',
                'specs' => [
                    'Car wire harness & commercial bus cable sub-assemblies',
                    'Heat-resistant cross-linked polyethylene (XLPE) jacket',
                    'IP67/IP68 sealed waterproof connector interfaces',
                    'Computerized digital continuity & crimp force analysis'
                ],
                'application' => 'Passenger car systems, commercial buses, chassis & sensor clusters.',
                'image' => asset('images/old_site/products/prod_automotive.jpg'),
            ],
            [
                'id' => 'prod-consumer',
                'code' => 'SEIKO-CON-03',
                'name' => 'Consumer Wire Harness',
                'category' => 'Consumer',
                'description' => 'High-yield wiring interconnects built for global consumer electronics, home appliances, audio/video, and communication devices (10+ configurations).',
                'wireGauge' => '18 – 28 AWG (UL1007 / UL1015 / UL1569)',
                'standard' => 'UL Recognized / RoHS 3',
                'standardColor' => 'bg-amber-50 text-amber-700 border-amber-200/80',
                'connectors' => ['JST VH/XH/RE', 'Molex Mini-Fit', 'TE Connectivity', 'Faston'],
                'tolerances' => 'Automated High-Speed Stripping & Cut Lengths',
                'testing' => '100% automated continuity & miswire prevention testing',
                'specs' => [
                    'UL style approved hook-up wires with color-coded tracing',
                    'Automated high-speed crimping with integrated CFM quality checks',
                    'IDC mass termination and discrete custom connector housings',
                    '100% RoHS 3, REACH, and Halogen-Free compliance'
                ],
                'application' => 'Home appliances, audio & video systems, printers, smart kitchen products.',
                'image' => asset('images/old_site/products/prod_consumer.png'),
            ],
            [
                'id' => 'prod-industrial',
                'code' => 'SEIKO-IND-04',
                'name' => 'Industrial Equipment Wire Harness',
                'category' => 'Industrial Equipment',
                'description' => 'Heavy-duty power, control panel, and machinery interconnect looms engineered for industrial automation and weighing equipment (9+ configurations).',
                'wireGauge' => '10 – 24 AWG (UL1015 / Shielded Control)',
                'standard' => 'ISO 9001:2015 / UL',
                'standardColor' => 'bg-blue-50 text-[#1b54a5] border-blue-200/80',
                'connectors' => ['Harting', 'Amphenol', 'Phoenix Contact', 'Molex'],
                'tolerances' => 'Precision Lacing & Braided Sleeving',
                'testing' => '100% Continuity, Hi-Pot & Pull-Force Verified',
                'specs' => [
                    'Oil, abrasion, and heat resistant industrial jacketing',
                    'Heavy-gauge lug & ferrule terminations',
                    'EMI/RFI braided shielding for PLC and motor drives',
                    'Custom point-to-point control cabinet routing'
                ],
                'application' => 'Industrial automation machinery, power supplies, weighing machines.',
                'image' => asset('images/old_site/products/prod_industrial.png'),
            ],
            [
                'id' => 'prod-med',
                'code' => 'SEIKO-MED-05',
                'name' => 'Medical and Healthcare Wire Harness',
                'category' => 'Medical',
                'description' => 'Low-noise shielded cable assemblies manufactured under strict ISO 13485:2016 standards for medical systems and measuring instruments (13+ configurations).',
                'wireGauge' => '24 – 36 AWG (Micro-Coax / Silicone)',
                'standard' => 'ISO 13485:2016',
                'standardColor' => 'bg-sky-50 text-sky-700 border-sky-200/80',
                'connectors' => ['Lemo Push-Pull', 'Molex Micro-Fit', 'Hypertronics', 'Fischer'],
                'tolerances' => 'Sub-Millimeter Micro-Crimp / Zero Flux Residue',
                'testing' => 'Ultra-low signal loss & 500V DC Insulation Resistance verified',
                'specs' => [
                    'Medical-grade biocompatible silicone & TPU outer jackets',
                    '100% dual-layer copper braided shield against EMI/RFI noise',
                    'Steam autoclave and chemical wipe sterilizable construction',
                    'Ultra-flexible high-strand micro-conductor routing'
                ],
                'application' => 'Patient monitoring systems, healthcare equipment, measuring instruments.',
                'image' => asset('images/old_site/products/prod_medical.png'),
            ],
            [
                'id' => 'prod-security',
                'code' => 'SEIKO-SEC-06',
                'name' => 'Security Product Wire Harness',
                'category' => 'Security',
                'description' => 'Ruggedized power and high-speed data transmission harnesses for luggage scanners, body scanners, and critical security systems (6+ configurations).',
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
                'application' => 'Airport luggage X-ray scanners, body scanners, security turnstiles.',
                'image' => asset('images/old_site/products/prod_security.png'),
            ],
            [
                'id' => 'prod-semi',
                'code' => 'SEIKO-SEM-07',
                'name' => 'Semi conductor Products',
                'category' => 'Semi-Con',
                'description' => 'High-density signal and multi-channel power routing assemblies for SMT machines, wafer systems, box builds, and front-end modules (14+ configurations).',
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
                    'Turn-key box build wiring & front-end module assemblies'
                ],
                'application' => 'Wafer handling robotics, SMT chip placers, box builds, front-end modules.',
                'image' => asset('images/old_site/products/prod_semicon.png'),
            ],
        ];
    }
}
