<?php
// Generate multi-page standalone product mini-sites in public/sites/<slug>/
// Pages: index, about, features, gallery, pricing, contact, login
// Self-contained (inline CSS/JS, local images) so each folder can be a subdomain docroot.

$base = dirname(__DIR__);
$data = json_decode(file_get_contents($base . '/resources/data/products.json'), true, 512, JSON_THROW_ON_ERROR);

$loginLabels = [
    'vahaai' => ['Student Login', 'Student ID'],
    'ka-crm' => ['Sales Team Login', 'User ID'],
    'pipeforge' => ['Developer Login', 'User ID'],
    'shopnest' => ['Store Owner Login', 'Store ID'],
    'kartpos' => ['Counter Login', 'Counter ID'],
    'peoplecore' => ['Employee Login', 'Employee ID'],
    'insightiq' => ['Analyst Login', 'User ID'],
    'convodesk' => ['Agent Login', 'Agent ID'],
    'visionkit' => ['Operator Login', 'Operator ID'],
    'documind' => ['User Login', 'User ID'],
    'voxa-ai' => ['User Login', 'User ID'],
    'agentforge' => ['User Login', 'User ID'],
];

// 6 gallery photos per product: [public-relative-path, caption]
$galleries = [
    'vahaai' => [
        ['images/cards/vahaai.jpg', 'A student learning with VAHA AI'],
        ['images/cards/ind-education.jpg', 'Classrooms powered by adaptive learning'],
        ['images/office/team-collaboration.jpg', 'Study groups working with the AI tutor'],
        ['images/cards/svc-mobile.jpg', 'Learning on any device, anywhere'],
        ['images/office/whiteboard-planning.jpg', 'Teachers planning with mastery insights'],
        ['images/tech/ai-generative.jpg', 'Powered by generative AI'],
    ],
    'ka-crm' => [
        ['images/cards/ka-crm.jpg', 'Sales pipeline dashboard in daily use'],
        ['images/cards/ai-analytics.jpg', 'Revenue forecasting with AI scoring'],
        ['images/office/team-meeting.jpg', 'Sales teams reviewing the pipeline together'],
        ['images/cards/svc-crm.jpg', 'Every lead captured automatically'],
        ['images/office/office-meeting.jpg', 'Weekly forecast reviews'],
        ['images/cards/peoplecore.jpg', 'Closing deals with confidence'],
    ],
    'pipeforge' => [
        ['images/cards/pipeforge.jpg', 'Pipelines defined right beside the code'],
        ['images/tech/code-screen.jpg', 'Every commit builds and tests automatically'],
        ['images/tech/data-center.jpg', 'Deploying to production infrastructure'],
        ['images/office/developer-desk.jpg', 'Developers shipping without fear'],
        ['images/tech/matrix-code.jpg', 'Automated security scanning'],
        ['images/tech/cyber-tech.jpg', 'Zero-downtime releases'],
    ],
    'shopnest' => [
        ['images/cards/shopnest.jpg', 'Shoppers on a ShopNest storefront'],
        ['images/cards/ind-retail.jpg', 'Browsing and buying on mobile'],
        ['images/cards/svc-ecommerce.jpg', 'Secure UPI and card checkout'],
        ['images/cards/kartpos.jpg', 'Counter and online store in sync'],
        ['images/cards/ind-logistics.jpg', 'Orders picked, packed and shipped'],
        ['images/office/team-laptops.jpg', 'Store teams managing catalogues'],
    ],
    'kartpos' => [
        ['images/cards/kartpos.jpg', 'Fast billing at the counter'],
        ['images/cards/ind-retail.jpg', 'Retail floors running on KartPOS'],
        ['images/cards/ind-logistics.jpg', 'Stock and inventory always in sync'],
        ['images/cards/shopnest.jpg', 'Online orders in the same dashboard'],
        ['images/cards/documind.jpg', 'GST reports generated automatically'],
        ['images/office/team-meeting.jpg', 'Multi-branch owners reviewing sales'],
    ],
    'peoplecore' => [
        ['images/cards/peoplecore.jpg', 'Onboarding a new hire in minutes'],
        ['images/cards/svc-hrms.jpg', 'HR teams reviewing dashboards together'],
        ['images/office/team-laptops.jpg', 'Employees using the self-service app'],
        ['images/cards/ind-manufacturing.jpg', 'Plant attendance with geo-fencing'],
        ['images/cards/documind.jpg', 'Payroll compliance handled automatically'],
        ['images/office/team-collaboration.jpg', 'People teams focused on people'],
    ],
    'insightiq' => [
        ['images/cards/insightiq.jpg', 'Live dashboards for the whole team'],
        ['images/cards/ai-analytics.jpg', 'Ask in English, get a chart'],
        ['images/tech/analyst-screens.jpg', 'Analysts monitoring metrics in real time'],
        ['images/office/whiteboard-planning.jpg', 'Decisions backed by one source of truth'],
        ['images/tech/data-center.jpg', 'Connected to every data source'],
        ['images/office/office-meeting.jpg', 'Monday reviews without spreadsheet wars'],
    ],
    'convodesk' => [
        ['images/cards/convodesk.jpg', 'Customers chatting with the AI assistant'],
        ['images/cards/ai-chatbot.jpg', 'One inbox for WhatsApp, web and Instagram'],
        ['images/office/developer-desk.jpg', 'Agents supervising smart handovers'],
        ['images/cards/svc-mobile.jpg', 'Answers on the apps customers already use'],
        ['images/cards/ind-retail.jpg', 'Orders taken right inside the chat'],
        ['images/office/team-working.jpg', 'Support teams doing more with less'],
    ],
    'visionkit' => [
        ['images/cards/visionkit.jpg', 'Vision AI watching the production line'],
        ['images/cards/ind-manufacturing.jpg', 'Defect detection on the factory floor'],
        ['images/tech/vr-headset.jpg', 'Every camera becomes an inspector'],
        ['images/cards/ind-logistics.jpg', 'Warehouse safety monitored 24/7'],
        ['images/tech/circuit-board.jpg', 'Edge AI on your own hardware'],
        ['images/cards/ind-retail.jpg', 'Retail footfall and shelf analytics'],
    ],
    'documind' => [
        ['images/cards/documind.jpg', 'Invoices extracted without typing'],
        ['images/cards/ind-finance.jpg', 'Finance teams closing books faster'],
        ['images/office/whiteboard-planning.jpg', 'Review only the flagged exceptions'],
        ['images/cards/ka-crm.jpg', 'Data flowing straight into your ERP'],
        ['images/cards/svc-hrms.jpg', 'KYC processing in seconds'],
        ['images/tech/code-screen.jpg', 'API-first document automation'],
    ],
    'voxa-ai' => [
        ['images/cards/voxa-ai.jpg', 'Voxa answering every business call'],
        ['images/cards/ai-chatbot.jpg', 'Appointments booked automatically'],
        ['images/office/office-meeting.jpg', 'Teams reviewing call transcripts'],
        ['images/cards/ind-healthcare.jpg', 'Clinics never missing a patient call'],
        ['images/cards/svc-mobile.jpg', 'WhatsApp summaries after every call'],
        ['images/cards/ind-hospitality.jpg', 'Hotels taking bookings around the clock'],
    ],
    'agentforge' => [
        ['images/cards/agentforge.jpg', 'Designing an AI agent visually'],
        ['images/tech/ai-robot-hand.jpg', 'Agents completing real work'],
        ['images/tech/circuit-board.jpg', 'Connected to your whole tool stack'],
        ['images/cards/insightiq.jpg', 'Nightly reports generated automatically'],
        ['images/office/developer-desk.jpg', 'Ops teams with a digital workforce'],
        ['images/cards/ind-finance.jpg', 'Reconciliation running while you sleep'],
    ],
];

// Unique interactive demo widget per product
$widgets = [
    'vahaai' => ['type' => 'chat', 'title' => 'Try the AI Tutor', 'sub' => 'Ask a study question and see how VAHA AI responds.', 'placeholder' => 'e.g. Explain photosynthesis simply', 'pairs' => [
        ['photosynthesis', 'Great question! 🌱 Photosynthesis is how plants make food: they take sunlight, water and CO2, and convert them into glucose and oxygen. Think of leaves as tiny solar-powered kitchens! Want a step-by-step diagram?'],
        ['math|algebra|equation', 'Let\'s solve it together! ✏️ Break the equation into small steps: isolate the variable, do the same operation on both sides, and check your answer by substituting back. Share your exact problem and I\'ll walk you through each step.'],
        ['exam|test|neet|jee', 'For exam prep 📚 I build you a daily plan: 40% weak topics, 30% revision, 30% mock tests. Based on your last quiz, I\'d start with your two weakest chapters. Shall I create this week\'s plan?'],
    ], 'default' => 'I\'d love to help with that! 🎓 In the full VAHA AI app I answer step by step from your own syllabus - in English or Tamil, by text or voice. Ask your teacher for access, or request a demo below!'],
    'convodesk' => ['type' => 'chat', 'title' => 'Chat With the Demo Bot', 'sub' => 'This is how your customers experience ConvoDesk.', 'placeholder' => 'e.g. Where is my order?', 'pairs' => [
        ['order|track|delivery', 'I can help with that! 📦 Your order #10482 was shipped yesterday via BlueDart and is arriving tomorrow before 8 PM. Want the live tracking link on WhatsApp?'],
        ['price|cost|how much', 'Our bestseller is Rs.1,299 with free delivery, and there\'s 10% off on prepaid orders today. 🛍 Shall I share the catalogue or apply the offer to your cart?'],
        ['refund|return|exchange', 'No problem! Returns are free within 7 days. 🙌 I\'ve started a return request for your recent order - a pickup will be scheduled tomorrow. Anything else?'],
    ], 'default' => 'Thanks for your message! 😊 In a live ConvoDesk setup I\'d answer this from your business\'s own catalogue and FAQs - and hand over to a human agent when needed. Request a demo to train me on your business!'],
    'voxa-ai' => ['type' => 'chat', 'title' => 'Simulate a Voice Call', 'sub' => 'Type what a caller would say - Voxa replies like it does on the phone.', 'placeholder' => 'e.g. I want an appointment tomorrow', 'pairs' => [
        ['appointment|book|slot', '📞 "Certainly! I have tomorrow at 11:30 AM or 4:15 PM available with the doctor. Which works better for you? I\'ll send the confirmation on WhatsApp right after we hang up."'],
        ['timing|open|hours', '📞 "We\'re open Monday to Saturday, 9 AM to 8 PM. Sundays we\'re closed. Would you like me to book you a visit?"'],
        ['price|cost|fee', '📞 "A standard consultation is Rs.500. If you need a detailed session it\'s Rs.800. Shall I reserve a slot for you?"'],
    ], 'default' => '📞 "That\'s a great question - let me connect you to our team member who can help you best. Please hold for just a moment." - In production, Voxa answers this from your business knowledge, in English or Tamil.'],
    'ka-crm' => ['type' => 'calc', 'title' => 'Revenue Impact Calculator', 'sub' => 'See what AI lead scoring could add to your monthly revenue.', 'input' => ['Leads you get per month', 50, 5000, 500], 'outputs' => [
        ['Extra deals closed / month', 0.035, '', ' deals', 'Assuming a 10% base close rate improved by 35% with AI prioritisation'],
        ['Additional revenue / month', 1750, 'Rs.', '', 'At an average deal value of Rs.50,000'],
    ]],
    'shopnest' => ['type' => 'calc', 'title' => 'Cart Recovery Calculator', 'sub' => 'Estimate sales recovered by WhatsApp cart reminders.', 'input' => ['Monthly store visitors', 1000, 200000, 10000], 'outputs' => [
        ['Abandoned carts recovered / month', 0.0054, '', ' orders', 'Assuming 3% add to cart and 18% recovery rate'],
        ['Recovered revenue / month', 6.48, 'Rs.', '', 'At an average order value of Rs.1,200'],
    ]],
    'peoplecore' => ['type' => 'calc', 'title' => 'HR Time Savings Calculator', 'sub' => 'See how many hours PeopleCore gives back to your HR team.', 'input' => ['Number of employees', 20, 5000, 200], 'outputs' => [
        ['HR hours saved / month', 0.5, '', ' hrs', 'Attendance, payroll and query automation at ~30 min saved per employee'],
        ['Cost saved / month', 200, 'Rs.', '', 'At Rs.400 per HR hour'],
    ]],
    'insightiq' => ['type' => 'calc', 'title' => 'Reporting Time Calculator', 'sub' => 'How much manual reporting time could InsightIQ remove?', 'input' => ['Reports your team builds per month', 5, 500, 40], 'outputs' => [
        ['Analyst hours saved / month', 2.5, '', ' hrs', 'Each manual report takes ~2.5 hours that dashboards remove'],
        ['Cost saved / month', 2000, 'Rs.', '', 'At Rs.800 per analyst hour'],
    ]],
    'pipeforge' => ['type' => 'pipeline', 'title' => 'Watch a Pipeline Run', 'sub' => 'This is what happens automatically on every git push.', 'button' => 'Run Pipeline', 'stages' => ['Fetch code from repository', 'Build application', 'Run 214 automated tests', 'Security & dependency scan', 'Deploy to production', 'Notify team on Slack'], 'done' => '✅ Deployed in 4m 12s - zero downtime'],
    'agentforge' => ['type' => 'pipeline', 'title' => 'Watch an Agent Work', 'sub' => 'A reconciliation agent completing its nightly run.', 'button' => 'Run Agent', 'stages' => ['Read 12,412 transactions from bank API', 'Match against ERP ledger entries', 'Auto-resolve 12,389 matches', 'Flag 23 exceptions for human review', 'Generate summary report', 'Post results to Slack #finance'], 'done' => '✅ Night run complete - 23 items for review, 3 analyst-days saved'],
    'documind' => ['type' => 'pipeline', 'title' => 'Process a Document', 'sub' => 'Watch an invoice go from scan to your ERP.', 'button' => 'Process Invoice', 'stages' => ['Receive scanned invoice (email-in)', 'AI reads layout & extracts 24 fields', 'Validate totals & GST numbers', 'Check for duplicate bills', 'Post voucher to Tally', 'Archive with full-text search'], 'done' => '✅ Invoice posted to Tally in 6.2 seconds - 98.7% confidence'],
    'kartpos' => ['type' => 'pipeline', 'title' => 'One Billing Cycle', 'sub' => 'What KartPOS does in the seconds behind every bill.', 'button' => 'Bill a Customer', 'stages' => ['Scan barcode - item found in 0.1s', 'Apply GST & scheme discounts', 'Print thermal receipt', 'Deduct stock across all channels', 'Sync to cloud dashboard', 'Update daily GST report'], 'done' => '✅ Bill #4,812 done in 4.8 seconds - stock synced everywhere'],
    'visionkit' => ['type' => 'scan', 'title' => 'Run a Live Inspection', 'sub' => 'Watch VisionKit inspect a frame from the production line.', 'button' => 'Run Inspection', 'boxes' => [
        ['14%', '22%', '30%', '26%', 'Surface OK - 99.1%', 'ok'],
        ['58%', '30%', '26%', '22%', 'Scratch detected - 97.8%', 'bad'],
        ['30%', '62%', '34%', '24%', 'Alignment OK - 98.6%', 'ok'],
    ], 'done' => '⚠ 1 defect flagged - line alerted in 0.3 seconds'],
];

function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// ---------- Reviews data ----------
$reviewNames = [
    'Rajesh Kumar', 'Priya Sharma', 'Arun Menon', 'Divya Krishnan', 'Mohammed Faizal', 'Karthik Subramanian',
    'Sneha Reddy', 'Lakshmi Narayanan', 'Suresh Babu', 'Anita Desai', 'Vignesh Prabhu', 'Arjun Mehta',
    'Meena Iyer', 'Vikram Chandran', 'Sandhya Nair', 'Ramesh Gupta', 'Kavitha Balan', 'Joseph Antony',
    'Deepa Venkatesh', 'Santosh Pillai', 'Fatima Begum', 'Nikhil Sharma', 'Revathi Sundaram', 'Manoj Krishnan',
    'Aishwarya Raman', 'Prakash Jain', 'Nithya Suresh', 'Ganesh Moorthy', 'Rahul Bhandari', 'Shalini Devi',
];

$reviewPersonas = [
    'vahaai' => ['Parent', 'Class 12 Student', 'School Principal', 'Maths Teacher', 'NEET Aspirant', 'Coaching Institute Owner'],
    'ka-crm' => ['Sales Director', 'Founder', 'Real Estate MD', 'Marketing Head', 'Business Owner', 'Sales Manager'],
    'pipeforge' => ['CTO', 'DevOps Lead', 'Engineering Manager', 'Startup Founder', 'Senior Developer', 'Tech Lead'],
    'shopnest' => ['D2C Founder', 'Boutique Owner', 'E-commerce Manager', 'Brand Owner', 'Online Seller', 'Retail Entrepreneur'],
    'kartpos' => ['Supermarket Owner', 'Pharmacy Owner', 'Retail Chain MD', 'Store Manager', 'Bakery Owner', 'Electronics Retailer'],
    'peoplecore' => ['HR Director', 'HR Manager', 'Factory HR Head', 'CHRO', 'Operations Head', 'Payroll Manager'],
    'insightiq' => ['CEO', 'Analytics Head', 'Finance Director', 'Operations Manager', 'Business Analyst', 'Managing Director'],
    'convodesk' => ['Support Head', 'E-commerce Founder', 'Clinic Administrator', 'Operations Manager', 'Customer Success Lead', 'Business Owner'],
    'visionkit' => ['Plant Head', 'Quality Manager', 'Factory Owner', 'Production Manager', 'Safety Officer', 'Operations Director'],
    'documind' => ['CFO', 'Finance Manager', 'CA Firm Partner', 'Accounts Head', 'Finance Controller', 'Audit Manager'],
    'voxa-ai' => ['Clinic Director', 'Salon Owner', 'Hospital Administrator', 'Service Centre Manager', 'Restaurant Owner', 'Dental Practice Owner'],
    'agentforge' => ['VP Operations', 'Automation Lead', 'COO', 'Finance Operations Head', 'IT Director', 'Process Excellence Manager'],
];

$specificReviews = [
    'vahaai' => [
        'My daughter\'s maths score went from 62% to 84% in one term. She actually asks the AI tutor the doubts she was too shy to ask in class.',
        'As a principal, the teacher dashboard is gold — I can see exactly which concept each class is stuck on before exams, not after.',
        'The Tamil voice tutoring is a blessing for our students. They learn in the language they think in.',
        'NEET prep felt impossible until VAHA built my daily plan. The adaptive mock tests are scarily accurate about what I need to revise.',
        'We rolled it out to 1,200 students in a week. The onboarding team handled everything including our own question bank.',
    ],
    'ka-crm' => [
        'We closed 35% more deals in the first quarter with the same team. The AI ranking tells my reps exactly who to call first every morning.',
        'Every lead from our website, ads and WhatsApp lands in one pipeline automatically. Nothing leaks anymore — nothing.',
        'The deal-win prediction is uncannily accurate. Our forecast meetings finally run on data instead of optimism.',
        'WhatsApp integration alone is worth it — the whole team shares one number and every chat is on the customer timeline.',
        'Moved from spreadsheets in under a week, with all our old deals and notes migrated free.',
    ],
    'pipeforge' => [
        'Deploys used to be a Friday-evening ritual of fear. Now interns ship to production safely. It paid for itself in the first outage it prevented.',
        'Zero-config is real — it detected our Laravel stack and had a full pipeline running in minutes.',
        'Preview environments for every pull request changed how our team reviews code. No more "works on my machine".',
        'One-click rollback saved us at 2 AM during a festival sale. Ten seconds and we were back.',
        'The build analytics showed us exactly where our 40-minute pipeline was wasting time. It is 8 minutes now.',
    ],
    'shopnest' => [
        'We shifted from a marketplace to our own ShopNest store and doubled our margin. The WhatsApp cart recovery alone pays the subscription.',
        'Store was live in 4 days with UPI, GST invoices and courier tracking all working. I did most of it myself.',
        'The AI recommendations lifted our average order value by 22%. It genuinely sells like a good shop assistant.',
        'Festival-season traffic did not even slow the site down. 3x normal orders, zero downtime.',
        'GST reports that used to take my accountant two days now download in one click.',
    ],
    'kartpos' => [
        'Three branches, one dashboard. Stock mismatches dropped to almost zero and GST filing went from two days to twenty minutes.',
        'Billing during Diwali rush without a single hiccup — even when the internet died for an hour. It just synced later.',
        'My pharmacy needed batch and expiry tracking — it handles both perfectly, with expiry alerts that have saved us lakhs in dead stock.',
        'Staff learned it in one hour. The keyboard-first billing is faster than any POS we have used.',
        'Online orders and counter sales finally share one stock. We stopped overselling completely.',
    ],
    'peoplecore' => [
        'Payroll for 1,800 employees used to take a full week. Now it is one morning — and statutory audits are painless.',
        'Geo-fenced attendance ended proxy punching at our sites overnight. The evidence trail is all there.',
        'The AI resume screening shortlisted better candidates in minutes than our old process found in weeks.',
        'Employee self-service cut our HR queries by more than half. Payslips, leave, reimbursements — all on their phones.',
        'PF, ESI and TDS handled correctly every single month. My compliance consultant is almost jobless now.',
    ],
    'insightiq' => [
        'Our Monday review went from arguing about whose Excel was right to deciding what to do next. One source of truth changed everything.',
        'I typed "sales by region last quarter" and got the exact chart in seconds. My team uses it without any training.',
        'The anomaly alerts caught a billing error that would have cost us lakhs before month-end. Paid for itself that day.',
        'Connected Tally, our CRM and Excel sheets in one afternoon. Dashboards update live now.',
        'Scheduled WhatsApp reports every morning mean my whole leadership team starts the day aligned.',
    ],
    'convodesk' => [
        'ConvoDesk answers 4 out of 5 customer chats end to end. Our two support agents now handle what used to need eight people.',
        'Trained it on our catalogue in an afternoon. It answers product questions better than some of our staff did.',
        'The human handover is seamless — customers never repeat themselves, and my agents get full context.',
        'Tamil support was the deciding factor for us. Our customers chat in the language they are comfortable in.',
        'Order tracking queries dropped to zero human touches. The bot just answers them, day and night.',
    ],
    'visionkit' => [
        'Customer rejections dropped 70% in three months. The line stops itself before a full batch is ruined.',
        'It runs on the CCTV cameras we already had. No new hardware, just intelligence added on top.',
        'PPE compliance alerts turned our safety audits from a nightmare into a formality — everything is evidence-backed.',
        'The shelf stock-out alerts in our stores recovered sales we did not even know we were losing.',
        'On-premise deployment meant our factory footage never leaves our network. That sealed the deal.',
    ],
    'documind' => [
        'We process 40,000 vendor invoices a month. DocuMind cut our entry team\'s workload by 90% and month-end closing by a full week.',
        'The Tally integration is flawless — verified vouchers just appear with the right ledger mapping.',
        'It reads even the ugliest scanned invoices our vendors send. The confidence scores tell my team exactly what to double-check.',
        'Duplicate bill detection caught a fraud attempt in our first month. That alone justified the cost.',
        'KYC processing went from 15 minutes per customer to 20 seconds.',
    ],
    'voxa-ai' => [
        'We used to miss 30% of calls during clinic hours. Voxa now books those patients automatically — two extra days of appointments a week.',
        'It speaks Tamil naturally. Our older patients don\'t even realise it is an AI until it tells them.',
        'Payment reminder calls that my staff dreaded now run automatically — and collections improved 40%.',
        'The WhatsApp summary after every call means nothing gets lost. Transcripts have settled more than one dispute.',
        'Zero hold time, ever. Our customers noticed within the first week.',
    ],
    'agentforge' => [
        'Our reconciliation agent processes 12,000 transactions nightly and flags exactly the 20 that need a human. That job took three analysts.',
        'The visual builder meant our operations team built their own agents — no developers needed after the first week.',
        'Human-in-the-loop checkpoints gave our compliance team the confidence to let agents touch real financial data.',
        'The audit log is a compliance officer\'s dream. Every action an agent takes, recorded and searchable.',
        'Weekly reports that consumed every Monday morning now generate themselves on Sunday night.',
    ],
];

$genericReviews = [
    'Onboarding was genuinely free and genuinely good. The team stayed with us until every user was comfortable.',
    'Support on WhatsApp actually replies in minutes. I have never experienced this with any software vendor before.',
    'We evaluated three alternatives. {name} won on ease of use, and six months in, we know we chose right.',
    'The 90-day support after launch fixed every small issue we found. Nothing was ever "out of scope".',
    'Fair, transparent pricing with a proper GST invoice every month. No surprises in one full year.',
    'The team listened to our feature requests and two of them shipped within a month. They treat customers like partners.',
    'Migration from our old system was handled completely by their team — verified to the last record.',
    'It just works. In eight months we have had zero downtime that affected our business.',
    'Training sessions were in plain language, not tech jargon. Even our least tech-savvy staff got comfortable fast.',
    'Every update makes it a little better without breaking what we already use. Rare discipline.',
    'The dashboard tells me everything I need in the first thirty seconds of my day.',
    '{name} scaled with us from a small team to three times the size without a hiccup.',
    'Honest team — they told us what the product could NOT do before we paid. That honesty won our trust.',
    'The mobile experience is as good as the desktop one. My team practically lives on it.',
    'Data export is one click, no lock-in games. Ironically, that is why we will never leave.',
    'Implementation finished ahead of the promised timeline. When does that ever happen with software?',
    'We asked for a small customisation and it was done in days, not months.',
    'The ROI was visible in the very first month. Our CFO signed the renewal without a single question.',
    'Security review by our IT team passed without any red flags. Documentation was ready and complete.',
    'After a year of daily use, the whole team agrees: this is the tool we would fight to keep.',
];

function buildReviews($slug, $productName, $reviewNames, $reviewPersonas, $specificReviews, $genericReviews) {
    mt_srand(crc32($slug)); // deterministic per product
    $names = $reviewNames;
    shuffle($names);
    $personas = $reviewPersonas[$slug] ?? ['Business Owner', 'Manager', 'Director', 'Founder'];
    $texts = $specificReviews[$slug] ?? [];
    $generic = $genericReviews;
    shuffle($generic);
    foreach (array_slice($generic, 0, 24 - count($texts)) as $g) {
        $texts[] = str_replace('{name}', $productName, $g);
    }
    // ratings mix ~4.8 avg
    $ratingPattern = [5, 5, 5, 4.5, 5, 5, 4, 5, 5, 4.5, 5, 5, 5, 4.5, 5, 4, 5, 5, 5, 4.5, 5, 5, 4.5, 5];
    $reviews = [];
    foreach ($texts as $i => $text) {
        $reviews[] = [
            'name' => $names[$i % count($names)],
            'role' => $personas[$i % count($personas)],
            'rating' => $ratingPattern[$i % count($ratingPattern)],
            'text' => $text,
        ];
    }
    return $reviews;
}

function reviewsHtml($reviews, $gradIndexBase = 0) {
    $grads = [
        'linear-gradient(135deg,#2563eb,#7c3aed)', 'linear-gradient(135deg,#db2777,#ec4899)',
        'linear-gradient(135deg,#0891b2,#22d3ee)', 'linear-gradient(135deg,#059669,#34d399)',
        'linear-gradient(135deg,#d97706,#fbbf24)', 'linear-gradient(135deg,#7c3aed,#a78bfa)',
    ];
    $html = '';
    foreach ($reviews as $i => $r) {
        $parts = preg_split('/\s+/', trim($r['name']));
        $initials = strtoupper(substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''));
        $full = (int) floor($r['rating']);
        $stars = str_repeat('★', $full) . ($r['rating'] - $full >= 0.5 ? '⯪' : '');
        $g = $grads[($i + $gradIndexBase) % count($grads)];
        $html .= '<div class="rev-card reveal">'
            . '<div class="rev-stars">' . $stars . ' <em>' . $r['rating'] . '</em></div>'
            . '<p>"' . e($r['text']) . '"</p>'
            . '<div class="rev-who"><span class="rev-av" style="background:' . $g . '">' . $initials . '</span>'
            . '<span><b>' . e($r['name']) . '</b><i>' . e($r['role']) . ' · Verified customer</i></span></div>'
            . '</div>';
    }
    return $html;
}

function sharedCss($gradient) {
    return <<<CSS
:root{--blue:#2563eb;--violet:#7c3aed;--pink:#db2777;--ink:#0b1220;--body:#33415c;--muted:#526079;--soft:#64748b;--bg:#f6f8fc;--grad:linear-gradient(135deg,#2563eb 0%,#7c3aed 55%,#db2777 100%);--pgrad:{$gradient};--radius:1rem;--radius-xl:1.5rem;}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth;scroll-padding-top:84px}
body{font-family:'Poppins','Inter','Segoe UI',system-ui,sans-serif;color:var(--body);background:var(--bg);line-height:1.65;-webkit-font-smoothing:antialiased}
h1,h2,h3,h4{color:var(--ink);line-height:1.2}
a{text-decoration:none;color:inherit;transition:.3s}
img{max-width:100%}
.container{max-width:1180px;margin:0 auto;padding:0 1.5rem}
.grad-text{background:var(--grad);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:.5rem;padding:.8rem 1.6rem;border-radius:1rem;font-weight:600;font-size:.95rem;border:none;cursor:pointer;transition:.3s;font-family:inherit}
.btn-primary{background:var(--pgrad);color:#fff;box-shadow:0 8px 20px rgba(37,99,235,.3);position:relative;overflow:hidden}
.btn-primary::before{content:'';position:absolute;top:0;left:-80%;width:50%;height:100%;background:linear-gradient(115deg,transparent,rgba(255,255,255,.45),transparent);transform:skewX(-20deg);transition:left .6s}
.btn-primary:hover::before{left:130%}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 28px rgba(37,99,235,.4)}
.btn-outline{background:rgba(255,255,255,.7);color:var(--ink);border:2px solid rgba(37,99,235,.3)}
.btn-outline:hover{background:rgba(37,99,235,.08)}
.progressbar{position:fixed;top:0;left:0;height:3px;width:0;background:var(--grad);z-index:200}
.totop{position:fixed;bottom:1.6rem;left:1.6rem;width:46px;height:46px;border-radius:50%;background:var(--pgrad);color:#fff;border:none;cursor:pointer;font-size:1rem;box-shadow:0 10px 24px rgba(37,99,235,.35);opacity:0;visibility:hidden;transform:translateY(10px);transition:.3s;z-index:150}
.totop.show{opacity:1;visibility:visible;transform:none}
header{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(255,255,255,.8);backdrop-filter:blur(16px) saturate(160%);border-bottom:1px solid rgba(15,23,42,.06);transition:.3s}
header.scrolled{background:rgba(255,255,255,.95);box-shadow:0 10px 24px rgba(15,23,42,.08)}
.nav{display:flex;align-items:center;justify-content:space-between;padding:.9rem 1.5rem;max-width:1180px;margin:0 auto}
.brand{display:flex;align-items:center;gap:.65rem;font-weight:800;font-size:1.25rem;color:var(--ink)}
.brand-mark{width:40px;height:40px;display:flex;align-items:center;justify-content:center;background:var(--pgrad);border-radius:.8rem;color:#fff;font-weight:800;font-size:1.1rem}
.nav ul{display:flex;gap:1.6rem;list-style:none;align-items:center}
.nav ul a{font-size:.92rem;font-weight:500;color:var(--muted);position:relative;padding:.3rem 0}
.nav ul a::after{content:'';position:absolute;left:0;bottom:0;width:0;height:2px;background:var(--grad);transition:.3s}
.nav ul a:hover,.nav ul a.active{color:var(--ink)}
.nav ul a:hover::after,.nav ul a.active::after{width:100%}
.nav ul a.btn::after{display:none}
.menu-btn{display:none;background:none;border:none;cursor:pointer;font-size:1.4rem;color:var(--ink)}
section{padding:5rem 0}
.sec-badge{display:inline-block;padding:.45rem 1.1rem;background:rgba(37,99,235,.08);border:1px solid rgba(37,99,235,.25);border-radius:999px;font-size:.82rem;font-weight:600;color:var(--blue);margin-bottom:1rem}
.sec-title{font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:.9rem}
.sec-desc{color:var(--muted);max-width:660px}
.center{text-align:center}.center .sec-desc{margin:0 auto}
.hero{padding:9.5rem 0 5rem;background:var(--pgrad);color:#fff;position:relative;overflow:hidden}
.hero .blob{position:absolute;border-radius:50%;background:rgba(255,255,255,.13);filter:blur(90px);animation:drift 14s ease-in-out infinite}
.hero .b1{width:480px;height:480px;top:-160px;right:-120px}
.hero .b2{width:360px;height:360px;bottom:-140px;left:-90px;animation-delay:4s}
@keyframes drift{0%,100%{transform:translate(0,0) scale(1)}50%{transform:translate(30px,-24px) scale(1.1)}}
.hero-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:3.5rem;align-items:center;position:relative;z-index:1}
.hero h1{color:#fff;font-size:clamp(2.2rem,4.5vw,3.4rem);margin:.5rem 0 1rem}
.hero .tag{font-size:.85rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;opacity:.9}
.hero p.lead{color:rgba(255,255,255,.9);font-size:1.1rem;margin-bottom:1.9rem;max-width:540px}
.hero-cta{display:flex;gap:1rem;flex-wrap:wrap;margin-bottom:2.6rem}
.btn-white{background:#fff;color:var(--ink)}
.btn-white:hover{transform:translateY(-2px)}
.btn-ghost{background:transparent;color:#fff;border:2px solid rgba(255,255,255,.55)}
.btn-ghost:hover{background:rgba(255,255,255,.15)}
.hero-stats{display:flex;gap:2.6rem;flex-wrap:wrap}
.hero-stats b{display:block;font-size:1.7rem}
.hero-stats span{font-size:.8rem;text-transform:uppercase;letter-spacing:.05em;opacity:.85}
.hero-photo{border-radius:var(--radius-xl);overflow:hidden;border:1px solid rgba(255,255,255,.35);box-shadow:0 24px 50px rgba(11,18,32,.35);transform:rotate(2deg);animation:heroin 1s cubic-bezier(.22,1,.36,1) .2s both}
@keyframes heroin{from{opacity:0;transform:rotate(2deg) translateY(30px)}to{opacity:1;transform:rotate(2deg) translateY(0)}}
.hero-photo img{display:block;width:100%}
.page-hero{padding:8.5rem 0 3.5rem;background:var(--pgrad);color:#fff;position:relative;overflow:hidden}
.page-hero .blob{position:absolute;border-radius:50%;background:rgba(255,255,255,.13);filter:blur(80px);width:420px;height:420px;top:-140px;right:-100px}
.page-hero h1{color:#fff;font-size:clamp(1.9rem,4vw,2.8rem);position:relative;z-index:1}
.page-hero p{color:rgba(255,255,255,.88);margin-top:.5rem;max-width:640px;position:relative;z-index:1}
.crumb{position:relative;z-index:1;font-size:.82rem;color:rgba(255,255,255,.75);margin-bottom:.8rem;display:block}
.crumb a:hover{color:#fff}
.marquee{overflow:hidden;background:#0d1730;padding:1rem 0}
.marquee-track{display:flex;gap:2.6rem;width:max-content;animation:scrollx 22s linear infinite}
.marquee span{color:#9fb0ce;font-weight:600;font-size:.9rem;white-space:nowrap}
.marquee span::before{content:'◆ ';color:var(--blue)}
@keyframes scrollx{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.cards{display:grid;grid-template-columns:repeat(3,1fr);gap:1.4rem;margin-top:2.6rem}
.card{background:rgba(255,255,255,.85);border:1px solid rgba(15,23,42,.07);border-radius:var(--radius-xl);padding:1.7rem;box-shadow:0 1px 3px rgba(15,23,42,.08);transition:.35s}
.card:hover{transform:translateY(-6px);border-color:rgba(37,99,235,.3);box-shadow:0 18px 40px rgba(37,99,235,.18)}
.card h3{font-size:1.05rem;margin-bottom:.5rem}
.card p{color:var(--muted);font-size:.92rem}
.dot{width:44px;height:44px;border-radius:.9rem;background:var(--pgrad);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;margin-bottom:1rem;transition:.3s}
.card:hover .dot{transform:scale(1.1) rotate(-6deg)}
.checklist{display:grid;grid-template-columns:1fr 1fr;gap:.9rem;margin-top:2.2rem}
.checklist li{list-style:none;display:flex;gap:.7rem;background:rgba(255,255,255,.85);border:1px solid rgba(15,23,42,.07);border-radius:1rem;padding:.95rem 1.15rem;font-size:.93rem;transition:.3s}
.checklist li:hover{transform:translateY(-3px);border-color:rgba(37,99,235,.3)}
.checklist li::before{content:'✓';color:var(--blue);font-weight:800}
.steps{margin-top:2.4rem;display:flex;flex-direction:column}
.step{display:flex;gap:1.2rem;padding-bottom:1.7rem;position:relative}
.step::before{content:'';position:absolute;left:21px;top:46px;bottom:0;width:2px;background:rgba(37,99,235,.2)}
.step:last-child::before{display:none}
.step-n{width:44px;height:44px;flex-shrink:0;border-radius:50%;background:var(--pgrad);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;position:relative;z-index:1}
.step h3{font-size:1.02rem;padding-top:.5rem}
.step p{color:var(--muted);font-size:.92rem}
.chips{display:flex;flex-wrap:wrap;gap:.7rem;margin-top:2rem}
.chip{padding:.55rem 1.1rem;background:rgba(255,255,255,.85);border:1px solid rgba(37,99,235,.22);border-radius:999px;font-size:.88rem;font-weight:600;transition:.3s}
.chip:hover{transform:translateY(-2px);border-color:rgba(37,99,235,.45)}
.quote{margin-top:2.4rem;padding:2rem;background:linear-gradient(135deg,rgba(37,99,235,.05),rgba(124,58,237,.05));border:1px solid rgba(37,99,235,.15);border-radius:var(--radius-xl)}
.quote blockquote{font-style:italic;color:#1e293b;font-size:1.05rem;margin-bottom:1.2rem}
.quote .who b{display:block;color:var(--ink);font-size:.93rem}
.quote .who span{color:var(--soft);font-size:.82rem}
details{background:rgba(255,255,255,.85);border:1px solid rgba(15,23,42,.07);border-radius:1rem;margin-bottom:.7rem;overflow:hidden}
details[open]{border-color:rgba(37,99,235,.3)}
summary{padding:1.05rem 1.4rem;cursor:pointer;font-weight:600;color:#14203a;list-style:none;display:flex;justify-content:space-between;gap:1rem}
summary::-webkit-details-marker{display:none}
summary::after{content:'▾';color:var(--blue);transition:.3s}
details[open] summary::after{transform:rotate(180deg)}
details p{padding:0 1.4rem 1.15rem;color:var(--muted);font-size:.93rem}
.tech{display:flex;flex-wrap:wrap;gap:.55rem;margin-top:1.6rem}
.tech span{padding:.4rem .85rem;background:rgba(37,99,235,.08);border:1px solid rgba(37,99,235,.2);border-radius:999px;font-size:.8rem;color:#1d4ed8;font-weight:600}
.shots{display:grid;grid-template-columns:repeat(3,1fr);gap:1.4rem;margin-top:2.4rem;text-align:left}
.shot{margin:0;border-radius:var(--radius-xl);overflow:hidden;border:1px solid rgba(15,23,42,.07);box-shadow:0 10px 25px rgba(15,23,42,.08);position:relative}
.shot img{display:block;width:100%;height:230px;object-fit:cover;transition:transform .7s cubic-bezier(.22,1,.36,1)}
.shot:hover img{transform:scale(1.07)}
.shot figcaption{position:absolute;left:0;right:0;bottom:0;padding:1.6rem 1.1rem .85rem;background:linear-gradient(180deg,transparent,rgba(11,18,32,.78));color:#fff;font-size:.85rem;font-weight:600}
.plans{display:grid;grid-template-columns:repeat(3,1fr);gap:1.6rem;margin-top:2.6rem;align-items:stretch}
.plan{position:relative;display:flex;flex-direction:column;background:rgba(255,255,255,.9);border:1px solid rgba(15,23,42,.08);border-radius:var(--radius-xl);padding:2rem 1.7rem;transition:.35s}
.plan:hover{transform:translateY(-8px);box-shadow:0 18px 40px rgba(37,99,235,.18)}
.plan.pop{border:2px solid rgba(37,99,235,.45);box-shadow:0 18px 40px rgba(37,99,235,.15)}
.plan .pbadge{position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:var(--grad);color:#fff;padding:.28rem .95rem;border-radius:999px;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;white-space:nowrap}
.plan h3{font-size:1.15rem;margin-bottom:.2rem}
.plan .pfor{color:var(--soft);font-size:.85rem;margin-bottom:1.1rem}
.plan .pprice{font-size:1.5rem;font-weight:800;color:var(--ink);margin-bottom:1.2rem}
.plan .pprice small{font-size:.8rem;color:var(--soft);font-weight:500}
.plan ul{list-style:none;display:flex;flex-direction:column;gap:.55rem;margin-bottom:1.6rem;flex:1}
.plan ul li{display:flex;gap:.55rem;font-size:.88rem}
.plan ul li::before{content:'✓';color:var(--blue);font-weight:800}
.contact-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:1.3rem;margin-top:2.4rem}
.ccard{background:rgba(255,255,255,.88);border:1px solid rgba(15,23,42,.07);border-radius:var(--radius-xl);padding:1.6rem;text-align:center;transition:.3s}
.ccard:hover{transform:translateY(-5px);border-color:rgba(37,99,235,.3)}
.ccard .ci{width:52px;height:52px;margin:0 auto 1rem;border-radius:50%;background:var(--pgrad);color:#fff;display:flex;align-items:center;justify-content:center;font-size:1.2rem}
.ccard b{display:block;color:var(--ink);margin-bottom:.3rem;font-size:.95rem}
.ccard span,.ccard a{color:var(--muted);font-size:.86rem;word-break:break-word}
.ccard a:hover{color:var(--blue)}
.cta-band{background:var(--grad);border-radius:var(--radius-xl);padding:3rem 2rem;text-align:center;color:#fff;position:relative;overflow:hidden}
.cta-band::after{content:'';position:absolute;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,.12);top:-140px;right:-80px}
.cta-band h2{color:#fff;font-size:clamp(1.5rem,3vw,2.1rem);margin-bottom:.6rem;position:relative;z-index:1}
.cta-band p{color:rgba(255,255,255,.85);margin-bottom:1.6rem;position:relative;z-index:1}
.cta-band .btn{position:relative;z-index:1}
.widget{margin-top:2.6rem;background:rgba(255,255,255,.92);border:1px solid rgba(37,99,235,.18);border-radius:var(--radius-xl);box-shadow:0 18px 40px rgba(37,99,235,.12);overflow:hidden}
.widget-head{padding:1.4rem 1.8rem;background:var(--pgrad);color:#fff}
.widget-head h3{color:#fff;font-size:1.15rem}
.widget-head p{color:rgba(255,255,255,.85);font-size:.86rem}
.widget-body{padding:1.6rem 1.8rem}
.wchat{height:300px;overflow-y:auto;display:flex;flex-direction:column;gap:.6rem;padding-bottom:.6rem}
.wmsg{max-width:82%;padding:.65rem .95rem;border-radius:1rem;font-size:.89rem;line-height:1.55;animation:msgin .3s cubic-bezier(.22,1,.36,1) both}
@keyframes msgin{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
.wmsg.bot{align-self:flex-start;background:#f1f5fb;border:1px solid rgba(15,23,42,.07);border-bottom-left-radius:.3rem;color:#1e293b}
.wmsg.user{align-self:flex-end;background:var(--pgrad);color:#fff;border-bottom-right-radius:.3rem}
.wtyping{align-self:flex-start;display:flex;gap:4px;padding:.8rem 1rem}
.wtyping i{width:7px;height:7px;border-radius:50%;background:#94a3b8;animation:tb 1.2s infinite}
.wtyping i:nth-child(2){animation-delay:.15s}.wtyping i:nth-child(3){animation-delay:.3s}
@keyframes tb{0%,60%,100%{transform:translateY(0)}30%{transform:translateY(-5px)}}
.winput{display:flex;gap:.6rem;margin-top:1rem}
.winput input{flex:1;padding:.75rem 1rem;border:1px solid rgba(15,23,42,.14);border-radius:999px;font-family:inherit;font-size:.9rem;background:#f8fafc}
.winput input:focus{outline:none;border-color:var(--blue);box-shadow:0 0 0 3px rgba(37,99,235,.12)}
.winput button{width:46px;height:46px;border-radius:50%;border:none;background:var(--pgrad);color:#fff;cursor:pointer;font-size:1rem}
.wslider{width:100%;margin:1.1rem 0 .4rem;accent-color:var(--blue)}
.wval{font-weight:800;color:var(--ink);font-size:1.3rem}
.wouts{display:grid;grid-template-columns:1fr 1fr;gap:1.2rem;margin-top:1.4rem}
.wout{background:#f1f5fb;border:1px solid rgba(37,99,235,.15);border-radius:1rem;padding:1.2rem;text-align:center}
.wout b{display:block;font-size:1.6rem;background:var(--grad);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.wout span{font-size:.8rem;color:var(--soft)}
.wnote{font-size:.75rem;color:var(--soft);margin-top:.9rem;text-align:center}
.wstages{list-style:none;display:flex;flex-direction:column;gap:.55rem;margin-top:.4rem}
.wstages li{display:flex;align-items:center;gap:.7rem;padding:.7rem 1rem;background:#f1f5fb;border:1px solid rgba(15,23,42,.06);border-radius:.9rem;font-size:.89rem;color:#475569;transition:.3s;opacity:.55}
.wstages li .st{width:22px;height:22px;flex-shrink:0;border-radius:50%;border:2px solid #cbd5e1;display:flex;align-items:center;justify-content:center;font-size:.65rem;color:#fff}
.wstages li.run{opacity:1;border-color:rgba(37,99,235,.4);color:var(--ink)}
.wstages li.run .st{border-color:var(--blue);background:var(--blue);animation:pulse 1s infinite}
.wstages li.done{opacity:1;color:var(--ink)}
.wstages li.done .st{border-color:#059669;background:#059669}
.wstages li.done .st::before{content:'✓'}
@keyframes pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.15)}}
.wdone{display:none;margin-top:1.1rem;padding:.85rem 1.1rem;background:#ecfdf5;border:1px solid #a7f3d0;border-radius:.9rem;font-size:.9rem;font-weight:600;color:#047857}
.wdone.show{display:block;animation:msgin .4s both}
.wscan{position:relative;border-radius:1rem;overflow:hidden;margin-top:.4rem}
.wscan img{display:block;width:100%;height:300px;object-fit:cover}
.scanline{position:absolute;left:0;right:0;top:0;height:3px;background:linear-gradient(90deg,transparent,#22d3ee,transparent);box-shadow:0 0 18px #22d3ee;display:none}
.wscan.scanning .scanline{display:block;animation:scan 1.8s linear}
@keyframes scan{from{top:0}to{top:100%}}
.wbox{position:absolute;border:2px solid;border-radius:.4rem;opacity:0;transition:opacity .4s}
.wbox.ok{border-color:#34d399}.wbox.bad{border-color:#f87171}
.wbox span{position:absolute;top:-24px;left:0;font-size:.68rem;font-weight:700;padding:.15rem .5rem;border-radius:.4rem;white-space:nowrap;color:#fff}
.wbox.ok span{background:#059669}.wbox.bad span{background:#dc2626}
.wbox.show{opacity:1}
footer{padding:2.5rem 0;background:linear-gradient(180deg,#eaf2ff,#dce8fb);border-top:1px solid rgba(37,99,235,.15);text-align:center;font-size:.88rem;color:var(--soft)}
footer a{color:var(--blue);font-weight:600}
footer .fnav{display:flex;justify-content:center;gap:1.4rem;margin-bottom:1rem;flex-wrap:wrap}
footer .fnav a{color:var(--muted);font-weight:500;font-size:.85rem}
footer .fnav a:hover{color:var(--blue)}
.reveal{opacity:0;transform:translateY(26px);transition:opacity .7s cubic-bezier(.22,1,.36,1),transform .7s cubic-bezier(.22,1,.36,1)}
.reveal.in{opacity:1;transform:none}
.cmp{width:100%;border-collapse:collapse;margin-top:2.2rem;background:rgba(255,255,255,.9);border-radius:1.2rem;overflow:hidden;box-shadow:0 10px 25px rgba(15,23,42,.07)}
.cmp th,.cmp td{padding:1rem 1.2rem;text-align:left;font-size:.9rem;border-bottom:1px solid rgba(15,23,42,.06)}
.cmp thead th{background:var(--pgrad);color:#fff;font-size:.95rem}
.cmp td:first-child{font-weight:600;color:var(--ink);width:26%}
.cmp .no{color:#b91c1c}.cmp .no::before{content:"✗ ";font-weight:800}
.cmp .yes{color:#047857}.cmp .yes::before{content:"✓ ";font-weight:800}
.cmp tr:hover td{background:rgba(37,99,235,.04)}
.cmp-wrap{overflow-x:auto}
.inc-strip{display:flex;flex-wrap:wrap;gap:.8rem;justify-content:center;margin-top:2rem}
.inc-strip span{display:inline-flex;align-items:center;gap:.45rem;padding:.6rem 1.1rem;background:rgba(255,255,255,.9);border:1px solid rgba(37,99,235,.2);border-radius:999px;font-size:.85rem;font-weight:600;color:var(--ink)}
.inc-strip span::before{content:"✓";color:var(--blue);font-weight:800}
.gmeta{float:right;font-style:normal;font-size:.72rem;color:var(--soft);font-weight:500;margin-left:.6rem}
.rev-summary{display:flex;align-items:center;gap:2rem;flex-wrap:wrap;background:rgba(255,255,255,.9);border:1px solid rgba(37,99,235,.15);border-radius:1.2rem;padding:1.6rem 2rem;margin-top:2rem;box-shadow:0 10px 25px rgba(15,23,42,.06)}
.rev-summary .big{font-size:3rem;font-weight:800;background:var(--grad);-webkit-background-clip:text;-webkit-text-fill-color:transparent;line-height:1}
.rev-summary .rstars{color:#f59e0b;font-size:1.2rem;letter-spacing:2px}
.rev-summary .rmeta{color:var(--soft);font-size:.85rem}
.rev-grid{column-count:3;column-gap:1.3rem;margin-top:2.2rem}
.rev-card{break-inside:avoid;background:rgba(255,255,255,.9);border:1px solid rgba(15,23,42,.07);border-radius:1.2rem;padding:1.4rem;margin-bottom:1.3rem;box-shadow:0 1px 3px rgba(15,23,42,.06);transition:.3s}
.rev-card:hover{transform:translateY(-4px);border-color:rgba(37,99,235,.3);box-shadow:0 14px 32px rgba(37,99,235,.14)}
.rev-stars{color:#f59e0b;font-size:1rem;letter-spacing:2px;margin-bottom:.6rem}
.rev-stars em{font-style:normal;color:var(--soft);font-size:.78rem;letter-spacing:0}
.rev-card p{font-size:.88rem;color:#1e293b;line-height:1.65;margin-bottom:1rem;font-style:italic}
.rev-who{display:flex;align-items:center;gap:.7rem}
.rev-av{width:38px;height:38px;flex-shrink:0;border-radius:50%;color:#fff;font-weight:800;font-size:.85rem;display:flex;align-items:center;justify-content:center}
.rev-who b{display:block;font-size:.85rem;color:var(--ink)}
.rev-who i{font-style:normal;font-size:.72rem;color:var(--soft)}
@media(max-width:1000px){.rev-grid{column-count:2}}
@media(max-width:640px){.rev-grid{column-count:1}}
.fsocial{display:flex;justify-content:center;gap:.8rem;margin-bottom:1.2rem}
.fsocial a{width:38px;height:38px;display:flex;align-items:center;justify-content:center;background:#fff;border:1px solid rgba(15,23,42,.1);border-radius:.6rem;box-shadow:0 1px 2px rgba(15,23,42,.06);transition:.3s}
.fsocial a:hover{transform:translateY(-3px)}
.fsocial a.li:hover{background:#0a66c2}.fsocial a.fb:hover{background:#1877f2}.fsocial a.tw:hover{background:#000}.fsocial a.gh:hover{background:#24292e}
.fsocial a.ig:hover{background:radial-gradient(circle at 30% 110%,#fdf497 0%,#fd5949 45%,#d6249f 60%,#285aeb 90%)}
.fsocial a:hover svg{fill:#fff}
#sbot{position:fixed;bottom:1.6rem;right:1.6rem;z-index:180}
.sbot-toggle{position:relative;width:54px;height:54px;border:none;border-radius:50%;background:var(--grad);color:#fff;font-size:1.3rem;cursor:pointer;box-shadow:0 12px 26px rgba(37,99,235,.4);transition:.3s;display:flex;align-items:center;justify-content:center}
.sbot-toggle:hover{transform:translateY(-3px) scale(1.05)}
.sbot-pulse{position:absolute;inset:0;border-radius:50%;border:2px solid rgba(37,99,235,.5);animation:spulse 2.4s ease-out infinite;pointer-events:none}
#sbot.open .sbot-pulse{display:none}
@keyframes spulse{0%{transform:scale(1);opacity:1}100%{transform:scale(1.7);opacity:0}}
.sbot-panel{position:absolute;bottom:66px;right:0;width:340px;max-width:calc(100vw - 2.5rem);height:440px;max-height:calc(100vh - 130px);display:flex;flex-direction:column;background:rgba(255,255,255,.97);backdrop-filter:blur(14px);border:1px solid rgba(37,99,235,.18);border-radius:1.2rem;box-shadow:0 24px 60px rgba(11,18,32,.25);overflow:hidden;opacity:0;visibility:hidden;transform:translateY(14px) scale(.97);transition:.3s cubic-bezier(.22,1,.36,1)}
#sbot.open .sbot-panel{opacity:1;visibility:visible;transform:none}
.sbot-head{display:flex;align-items:center;gap:.7rem;padding:.9rem 1.1rem;background:var(--pgrad);color:#fff}
.sbot-head .av{width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.22);display:flex;align-items:center;justify-content:center}
.sbot-head b{display:block;font-size:.9rem}
.sbot-head span{font-size:.72rem;opacity:.9}
.sbot-msgs{flex:1;overflow-y:auto;padding:.9rem;display:flex;flex-direction:column;gap:.55rem;background:#f6f8fc}
.sbot-msg{max-width:86%;padding:.55rem .85rem;border-radius:.9rem;font-size:.84rem;line-height:1.55;animation:msgin .3s both;word-wrap:break-word}
.sbot-msg.bot{align-self:flex-start;background:#fff;border:1px solid rgba(15,23,42,.08);border-bottom-left-radius:.25rem;color:#1e293b}
.sbot-msg.bot a{color:var(--blue);font-weight:600;text-decoration:underline}
.sbot-msg.user{align-self:flex-end;background:var(--pgrad);color:#fff;border-bottom-right-radius:.25rem}
.sbot-quick{display:flex;flex-wrap:wrap;gap:.35rem;padding:.5rem .8rem;background:#f6f8fc;border-top:1px solid rgba(15,23,42,.06)}
.sbot-quick button{padding:.32rem .7rem;background:#fff;border:1px solid rgba(37,99,235,.3);border-radius:999px;font-size:.72rem;font-weight:600;color:#1d4ed8;cursor:pointer;font-family:inherit;transition:.3s}
.sbot-quick button:hover{background:rgba(37,99,235,.08)}
.sbot-in{display:flex;gap:.5rem;padding:.65rem .8rem;background:#fff;border-top:1px solid rgba(15,23,42,.08)}
.sbot-in input{flex:1;padding:.55rem .85rem;border:1px solid rgba(15,23,42,.12);border-radius:999px;font-size:.84rem;font-family:inherit;background:#f6f8fc}
.sbot-in input:focus{outline:none;border-color:var(--blue)}
.sbot-in button{width:38px;height:38px;flex-shrink:0;border:none;border-radius:50%;background:var(--pgrad);color:#fff;cursor:pointer}
.sbot-links{display:flex;flex-wrap:wrap;gap:.35rem;margin-top:.5rem}
.sbot-links a{display:inline-flex;padding:.3rem .65rem;background:rgba(37,99,235,.08);border:1px solid rgba(37,99,235,.25);border-radius:999px;font-size:.72rem;font-weight:600;color:#1d4ed8 !important;text-decoration:none !important}
#swa{position:fixed;bottom:6.3rem;right:1.6rem;z-index:180}
.swa-btn{position:relative;width:54px;height:54px;border:none;border-radius:50%;background:linear-gradient(135deg,#25d366,#128c7e);color:#fff;cursor:pointer;box-shadow:0 12px 26px rgba(37,211,102,.4);transition:.3s;display:flex;align-items:center;justify-content:center}
.swa-btn:hover{transform:translateY(-3px) scale(1.05)}
.swa-btn svg{width:26px;height:26px;fill:#fff}
.swa-pulse{position:absolute;inset:0;border-radius:50%;border:2px solid rgba(37,211,102,.55);animation:spulse 2.4s ease-out infinite;animation-delay:1.2s;pointer-events:none}
@media(max-width:900px){
 .hero-grid{grid-template-columns:1fr}
 .hero-photo{display:none}
 .cards,.shots,.plans{grid-template-columns:1fr}
 .checklist{grid-template-columns:1fr}
 .contact-cards{grid-template-columns:1fr 1fr}
 .wouts{grid-template-columns:1fr}
 .nav ul{position:fixed;top:64px;right:-100%;width:78%;max-width:300px;height:100vh;background:rgba(255,255,255,.97);flex-direction:column;align-items:flex-start;padding:2rem;gap:1.2rem;transition:.3s;box-shadow:-10px 0 30px rgba(15,23,42,.1)}
 .nav ul.open{right:0}
 .menu-btn{display:block}
}
@media(max-width:520px){.contact-cards{grid-template-columns:1fr}}
CSS;
}

function sharedJs() {
    return <<<'JS'
document.querySelector('.menu-btn').addEventListener('click',function(){document.querySelector('.nav ul').classList.toggle('open')});
document.querySelectorAll('.nav ul a').forEach(function(a){a.addEventListener('click',function(){document.querySelector('.nav ul').classList.remove('open')})});
var obs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');obs.unobserve(e.target)}})},{threshold:.12});
document.querySelectorAll('.reveal').forEach(function(el){obs.observe(el)});
var hdr=document.querySelector('header');
if(hdr){window.addEventListener('scroll',function(){hdr.classList.toggle('scrolled',scrollY>40)},{passive:true});}
var pb=document.createElement('div');pb.className='progressbar';document.body.appendChild(pb);
window.addEventListener('scroll',function(){var d=document.documentElement;var m=d.scrollHeight-d.clientHeight;pb.style.width=(m>0?(d.scrollTop/m)*100:0)+'%'},{passive:true});
var tt=document.createElement('button');tt.className='totop';tt.innerHTML='↑';tt.setAttribute('aria-label','Top');document.body.appendChild(tt);
tt.addEventListener('click',function(){scrollTo({top:0,behavior:'smooth'})});
window.addEventListener('scroll',function(){tt.classList.toggle('show',scrollY>400)},{passive:true});
document.querySelectorAll('[data-count]').forEach(function(el){
 var raw=el.getAttribute('data-count');var m=raw.match(/^([^0-9]*)([0-9][0-9.,]*)(.*)$/);
 if(!m){return}
 var pre=m[1],num=parseFloat(m[2].replace(/,/g,'')),suf=m[3];
 if(isNaN(num)){return}
 var o=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){o.unobserve(el);
  var t0=null;var dur=1600;
  function tick(ts){if(!t0)t0=ts;var p=Math.min((ts-t0)/dur,1);p=1-Math.pow(1-p,3);
   var v=num*p;el.textContent=pre+(num%1===0?Math.round(v).toLocaleString('en-IN'):v.toFixed(1))+suf;
   if(p<1)requestAnimationFrame(tick)}
  requestAnimationFrame(tick)}})},{threshold:.6});
 o.observe(el)});
JS;
}

function navHtml($name, $initial, $active, $loginTitle) {
    $items = ['index' => 'Home', 'about' => 'About', 'features' => 'Features', 'gallery' => 'Gallery', 'reviews' => 'Reviews', 'resources' => 'Guides', 'pricing' => 'Pricing', 'contact' => 'Contact'];
    $links = '';
    foreach ($items as $page => $label) {
        $cls = $page === $active ? ' class="active"' : '';
        $links .= "<li><a href=\"$page.html\"$cls>$label</a></li>";
    }
    $links .= "<li><a href=\"login.html\" class=\"btn btn-primary\" style=\"padding:.55rem 1.2rem\">$loginTitle</a></li>";
    return <<<HTML
<header>
  <nav class="nav">
    <a href="index.html" class="brand"><span class="brand-mark">{$initial}</span> {$name}</a>
    <ul id="menu">{$links}</ul>
    <button class="menu-btn" aria-label="Menu">☰</button>
  </nav>
</header>
HTML;
}

function footerHtml($name) {
    $social = <<<HTML
<div class="fsocial">
  <a class="li" href="https://www.linkedin.com/company/kasoftware" target="_blank" rel="noopener" aria-label="LinkedIn"><svg width="18" height="18" viewBox="0 0 24 24" fill="#0a66c2"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
  <a class="tw" href="https://twitter.com/kasoftware" target="_blank" rel="noopener" aria-label="X"><svg width="18" height="18" viewBox="0 0 24 24" fill="#0f1419"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
  <a class="gh" href="https://github.com/kasoftware" target="_blank" rel="noopener" aria-label="GitHub"><svg width="18" height="18" viewBox="0 0 24 24" fill="#24292e"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg></a>
  <a class="fb" href="https://www.facebook.com/kasoftware" target="_blank" rel="noopener" aria-label="Facebook"><svg width="18" height="18" viewBox="0 0 24 24" fill="#1877f2"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.378 14.192 5 15.115 5H18V0h-3.808C10.596 0 9 1.583 9 4.615V8z"/></svg></a>
  <a class="ig" href="https://www.instagram.com/kasoftware" target="_blank" rel="noopener" aria-label="Instagram"><svg width="18" height="18" viewBox="0 0 24 24" fill="#e4405f"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
</div>
HTML;
    return <<<HTML
<footer>
  <div class="container">
    {$social}
    <div class="fnav">
      <a href="index.html">Home</a><a href="about.html">About</a><a href="features.html">Features</a>
      <a href="gallery.html">Gallery</a><a href="reviews.html">Reviews</a><a href="resources.html">Guides</a><a href="pricing.html">Pricing</a><a href="contact.html">Contact</a><a href="login.html">Login</a>
    </div>
    © <span class="yr"></span> {$name} · A product of <a href="https://kasoftware.in/">KA Software</a>, Chennai, India
  </div>
</footer>
<script>document.querySelectorAll('.yr').forEach(function(e){e.textContent=new Date().getFullYear()});</script>
HTML;
}

function siteBotJs($p, $loginTitle) {
    $name = $p['name'];
    $feat = implode(' · ', array_slice($p['features'], 0, 4));
    $intents = [
        ['hi|hello|hey|vanakkam|good morning|good evening', 'Hello! 👋 I\'m the ' . $name . ' assistant. Ask me about <b>features</b>, <b>pricing</b>, <b>demo</b>, <b>login</b>, or <b>contact</b> — or tap a quick question below.'],
        ['what is|about|tell me about|explain', $p['description'] . ' <a href="about.html">Read the full story →</a>'],
        ['feature|what can|capabilit|function|module', 'Top features: ' . $feat . ' — and more. <a href="features.html">See all features →</a>'],
        ['price|pricing|cost|plan|quote|subscription|how much', 'We have Starter, Professional and Enterprise plans, priced to your scale. <a href="pricing.html">View plans →</a> For an exact quote, we respond within 48 hours — <a href="contact.html">contact us</a>.'],
        ['demo|trial|try|test', 'We\'d love to show you! 🎥 We set up a personalised demo within 48 hours. <a href="contact.html">Request a demo →</a> or call <a href="tel:+918056653499">+91 80566 53499</a>.'],
        ['login|log in|sign in|signin|password|forgot|invalid|cant access|can\'t access', 'You can sign in on the <a href="login.html">' . $loginTitle . ' page</a>. If your credentials show invalid or you forgot your password, please contact your administrator or email <a href="mailto:info@kasoftware.in">info@kasoftware.in</a> and we\'ll restore access quickly.'],
        ['photo|image|screenshot|gallery|picture', 'See ' . $name . ' in the real world 📸 — <a href="gallery.html">open the gallery →</a>'],
        ['how it works|setup|install|onboard|start|implement', 'Getting started is simple — see the step-by-step process on the <a href="features.html">Features page</a>. Onboarding, training and data migration are included in every plan.'],
        ['support|help|issue|problem|error|bug|complain', 'Sorry you\'re facing trouble! Our support team responds fast:{LINKS}'],
        ['contact|phone|call|email|reach|talk', 'Reach us anytime:<br>📞 <a href="tel:+918056653499">+91 80566 53499</a><br>📧 <a href="mailto:info@kasoftware.in">info@kasoftware.in</a><br>Or the <a href="contact.html">contact page →</a>'],
        ['address|location|where|office|chennai|visit', 'We\'re at Anna Nagar, Chennai - 600049, Tamil Nadu, India. 🏢 Mon–Sat, 9 AM to 8 PM. <a href="contact.html">Contact details →</a>'],
        ['ka software|company|who built|who made|developer', $name . ' is built and supported by <a href="https://kasoftware.in/" target="_blank" rel="noopener">KA Software</a> — an AI-powered software company in Chennai with 500+ projects delivered.'],
        ['integrat|api|connect|tally|erp', $name . ' integrates with your existing systems — see the tech stack on the <a href="about.html">About page</a>, or ask our team about your specific tools via the <a href="contact.html">contact page</a>.'],
        ['secure|security|data|privacy|safe', 'Your data is encrypted in transit and at rest, with role-based access. Enterprise plans include on-premise deployment. Ask us anything security-related at <a href="mailto:info@kasoftware.in">info@kasoftware.in</a>.'],
        ['thank|thanks|nandri', 'You\'re most welcome! 😊 Anything else I can help you with?'],
        ['bye|goodbye|see you', 'Goodbye! 👋 Come back anytime — or reach us on WhatsApp for a quick chat.'],
    ];
    $intentsJson = json_encode($intents, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $nameJson = json_encode($name, JSON_UNESCAPED_UNICODE);
    return <<<JS
(function(){
 var NAME={$nameJson};
 var INTENTS={$intentsJson};
 var LINKS='<span class="sbot-links"><a href="contact.html">Contact Page</a><a href="tel:+918056653499">Call Us</a><a href="#" data-wa="1">WhatsApp</a><a href="mailto:info@kasoftware.in">Email</a></span>';
 var FALLBACK='Hmm, I\'m not sure about that one 🤔 — but our team definitely can help:'+LINKS;
 function openWA(){
  var msg=encodeURIComponent('Hi! I\'m interested in '+NAME+'. Please share more details.');
  var web='https://wa.me/918056653499?text='+msg;
  if(!/android|iphone|ipad|ipod/i.test(navigator.userAgent)){window.open(web,'_blank','noopener');return}
  var opened=false;function mark(){opened=true}
  document.addEventListener('visibilitychange',mark,{once:true});
  window.addEventListener('pagehide',mark,{once:true});window.addEventListener('blur',mark,{once:true});
  location.href='whatsapp://send?phone=918056653499&text='+msg;
  setTimeout(function(){if(!opened&&!document.hidden){location.href=web}},1600);
 }
 // WhatsApp floating button (left, above chatbot)
 var wa=document.createElement('div');wa.id='swa';
 wa.innerHTML='<button type="button" class="swa-btn" aria-label="WhatsApp"><svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg><span class="swa-pulse"></span></button>';
 document.body.appendChild(wa);
 wa.querySelector('.swa-btn').addEventListener('click',function(){
  var b=document.getElementById('sbot');if(b)b.classList.remove('open');openWA();
 });
 // Chatbot (left)
 var root=document.createElement('div');root.id='sbot';
 root.innerHTML='<button type="button" class="sbot-toggle" aria-label="Chat with us"><svg width="24" height="24" viewBox="0 0 24 24" fill="#fff"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/><circle cx="8" cy="10" r="1.35" fill="var(--blue)"/><circle cx="12" cy="10" r="1.35" fill="var(--blue)"/><circle cx="16" cy="10" r="1.35" fill="var(--blue)"/></svg><span class="sbot-pulse"></span></button>'
 +'<div class="sbot-panel"><div class="sbot-head"><div class="av"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M12 2a2 2 0 0 1 2 2c0 .74-.4 1.39-1 1.73V7h1a7 7 0 0 1 7 7h1v4h-2v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-1H2v-4h1a7 7 0 0 1 7-7h1V5.73c-.6-.34-1-.99-1-1.73a2 2 0 0 1 2-2zm-3.5 10a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm7 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg></div><div><b>'+NAME+' Assistant</b><span>● Online — ask me anything</span></div></div>'
 +'<div class="sbot-msgs" id="sbmsgs"></div><div class="sbot-quick" id="sbquick"></div>'
 +'<form class="sbot-in" id="sbform"><input type="text" id="sbinp" placeholder="Type your question..." maxlength="250"><button type="submit">➤</button></form></div>';
 document.body.appendChild(root);
 var msgs=document.getElementById('sbmsgs'),form=document.getElementById('sbform'),inp=document.getElementById('sbinp'),quick=document.getElementById('sbquick');
 var greeted=false;
 function add(html,who,asHtml){var d=document.createElement('div');d.className='sbot-msg '+who;
  if(asHtml){d.innerHTML=html}else{d.textContent=html}
  msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight;}
 function answer(text){
  var low=text.toLowerCase(),ans=FALLBACK;
  outer:for(var i=0;i<INTENTS.length;i++){var kws=INTENTS[i][0].split('|');
   for(var k=0;k<kws.length;k++){if(low.indexOf(kws[k])!==-1){ans=INTENTS[i][1];break outer}}}
  ans=ans.replace('{LINKS}',LINKS);
  setTimeout(function(){add(ans,'bot',true)},650+Math.random()*450);
 }
 ['Features','Pricing','Request Demo','Login Help','Contact Support'].forEach(function(q){
  var b=document.createElement('button');b.type='button';b.textContent=q;
  b.addEventListener('click',function(){add(q,'user');answer(q==='Contact Support'?'support':q)});
  quick.appendChild(b);
 });
 root.querySelector('.sbot-toggle').addEventListener('click',function(){
  var open=root.classList.toggle('open');
  if(open&&!greeted){greeted=true;
   setTimeout(function(){add('Hi! 👋 I\'m the <b>'+NAME+' assistant</b>. Ask me about features, pricing, demos, login help — anything!','bot',true)},300);}
  if(open){inp.focus()}
 });
 form.addEventListener('submit',function(e){e.preventDefault();var t=inp.value.trim();if(!t)return;
  add(t,'user');inp.value='';answer(t)});
 document.addEventListener('click',function(e){
  var t=e.target.closest?e.target.closest('[data-wa]'):null;
  if(t){e.preventDefault();openWA()}
 });
})();
JS;
}

function pageShell($title, $desc, $css, $nav, $bodyHtml, $footer, $js, $extraJs = '') {
    return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$title}</title>
<meta name="description" content="{$desc}">
<style>{$css}</style>
</head>
<body>
{$nav}
{$bodyHtml}
{$footer}
<script>
{$js}
{$extraJs}
</script>
</body>
</html>
HTML;
}

function pageHero($crumbName, $title, $sub) {
    return <<<HTML
<section class="page-hero">
  <div class="blob"></div>
  <div class="container">
    <span class="crumb"><a href="index.html">{$crumbName}</a> / {$title}</span>
    <h1>{$title}</h1>
    <p>{$sub}</p>
  </div>
</section>
HTML;
}

function buildWidget($slug, $widgets) {
    if (empty($widgets[$slug])) return ['', ''];
    $w = $widgets[$slug];
    $title = e($w['title']); $sub = e($w['sub']);
    if ($w['type'] === 'chat') {
        $pairsJson = json_encode($w['pairs'], JSON_UNESCAPED_UNICODE);
        $def = json_encode($w['default'], JSON_UNESCAPED_UNICODE);
        $ph = e($w['placeholder']);
        $html = <<<HTML
<div class="widget reveal">
  <div class="widget-head"><h3>{$title}</h3><p>{$sub}</p></div>
  <div class="widget-body">
    <div class="wchat" id="wchat"><div class="wmsg bot">Hi! 👋 Try me — {$sub}</div></div>
    <form class="winput" id="wform"><input type="text" id="winp" placeholder="{$ph}" maxlength="200"><button type="submit">➤</button></form>
  </div>
</div>
HTML;
        $js = <<<JS
(function(){
 var pairs={$pairsJson},def={$def};
 var chat=document.getElementById('wchat'),form=document.getElementById('wform'),inp=document.getElementById('winp');
 if(!chat)return;
 function add(t,who){var d=document.createElement('div');d.className='wmsg '+who;d.textContent=t;chat.appendChild(d);chat.scrollTop=chat.scrollHeight;}
 form.addEventListener('submit',function(e){e.preventDefault();var t=inp.value.trim();if(!t)return;add(t,'user');inp.value='';
  var ty=document.createElement('div');ty.className='wtyping';ty.innerHTML='<i></i><i></i><i></i>';chat.appendChild(ty);chat.scrollTop=chat.scrollHeight;
  setTimeout(function(){ty.remove();var low=t.toLowerCase(),ans=def;
   outer:for(var i=0;i<pairs.length;i++){var kws=pairs[i][0].split('|');for(var k=0;k<kws.length;k++){if(low.indexOf(kws[k])!==-1){ans=pairs[i][1];break outer}}}
   add(ans,'bot')},800+Math.random()*500)});
})();
JS;
        return [$html, $js];
    }
    if ($w['type'] === 'calc') {
        [$label, $min, $max, $defv] = $w['input'];
        $outsHtml = '';
        $outsJsArr = [];
        foreach ($w['outputs'] as $i => $o) {
            $outsHtml .= '<div class="wout"><b id="wo' . $i . '">—</b><span>' . e($o[0]) . '</span></div>';
            $outsJsArr[] = [$o[1], $o[2], $o[3]];
        }
        $outsJs = json_encode($outsJsArr);
        $notes = e(implode(' · ', array_map(fn($o) => $o[4], $w['outputs'])));
        $lab = e($label);
        $html = <<<HTML
<div class="widget reveal">
  <div class="widget-head"><h3>{$title}</h3><p>{$sub}</p></div>
  <div class="widget-body">
    <label style="font-weight:600;color:#14203a;font-size:.9rem">{$lab}: <span class="wval" id="wv">{$defv}</span></label>
    <input type="range" class="wslider" id="ws" min="{$min}" max="{$max}" value="{$defv}">
    <div class="wouts">{$outsHtml}</div>
    <p class="wnote">Estimates only. {$notes}</p>
  </div>
</div>
HTML;
        $js = <<<JS
(function(){
 var outs={$outsJs};
 var s=document.getElementById('ws'),v=document.getElementById('wv');
 if(!s)return;
 function fmt(n){return Math.round(n).toLocaleString('en-IN')}
 function upd(){var x=parseInt(s.value);v.textContent=fmt(x);
  outs.forEach(function(o,i){document.getElementById('wo'+i).textContent=o[1]+fmt(x*o[0])+o[2]})}
 s.addEventListener('input',upd);upd();
})();
JS;
        return [$html, $js];
    }
    if ($w['type'] === 'pipeline') {
        $stagesHtml = '';
        foreach ($w['stages'] as $s) { $stagesHtml .= '<li><span class="st"></span>' . e($s) . '</li>'; }
        $btn = e($w['button']); $done = e($w['done']);
        $html = <<<HTML
<div class="widget reveal">
  <div class="widget-head"><h3>{$title}</h3><p>{$sub}</p></div>
  <div class="widget-body">
    <ul class="wstages" id="wstages">{$stagesHtml}</ul>
    <div class="wdone" id="wdone">{$done}</div>
    <button class="btn btn-primary" id="wrun" style="margin-top:1.2rem">{$btn}</button>
  </div>
</div>
HTML;
        $js = <<<'JS'
(function(){
 var list=document.getElementById('wstages');if(!list)return;
 var items=list.querySelectorAll('li'),btn=document.getElementById('wrun'),done=document.getElementById('wdone');
 btn.addEventListener('click',function(){
  btn.disabled=true;done.classList.remove('show');
  items.forEach(function(li){li.classList.remove('run','done')});
  var i=0;
  function next(){
   if(i>0){items[i-1].classList.remove('run');items[i-1].classList.add('done');}
   if(i>=items.length){done.classList.add('show');btn.disabled=false;return}
   items[i].classList.add('run');i++;setTimeout(next,700+Math.random()*400)}
  next()});
})();
JS;
        return [$html, $js];
    }
    if ($w['type'] === 'scan') {
        $boxes = '';
        foreach ($w['boxes'] as $i => $b) {
            $boxes .= '<div class="wbox ' . $b[5] . '" id="wb' . $i . '" style="left:' . $b[0] . ';top:' . $b[1] . ';width:' . $b[2] . ';height:' . $b[3] . '"><span>' . e($b[4]) . '</span></div>';
        }
        $btn = e($w['button']); $done = e($w['done']);
        $count = count($w['boxes']);
        $html = <<<HTML
<div class="widget reveal">
  <div class="widget-head"><h3>{$title}</h3><p>{$sub}</p></div>
  <div class="widget-body">
    <div class="wscan" id="wscan"><img src="shot1.jpg" alt="Inspection frame"><div class="scanline"></div>{$boxes}</div>
    <div class="wdone" id="wdone">{$done}</div>
    <button class="btn btn-primary" id="wrun" style="margin-top:1.2rem">{$btn}</button>
  </div>
</div>
HTML;
        $js = <<<JS
(function(){
 var scan=document.getElementById('wscan');if(!scan)return;
 var btn=document.getElementById('wrun'),done=document.getElementById('wdone'),n={$count};
 btn.addEventListener('click',function(){btn.disabled=true;done.classList.remove('show');
  for(var i=0;i<n;i++){document.getElementById('wb'+i).classList.remove('show')}
  scan.classList.remove('scanning');void scan.offsetWidth;scan.classList.add('scanning');
  setTimeout(function(){for(var i=0;i<n;i++){(function(i){setTimeout(function(){document.getElementById('wb'+i).classList.add('show')},i*350)})(i)}
   setTimeout(function(){done.classList.add('show');btn.disabled=false},n*350+200)},1800)});
})();
JS;
        return [$html, $js];
    }
    return ['', ''];
}

foreach ($data['products'] as $p) {
    $slug = $p['slug'];
    $dir = "$base/public/sites/$slug";
    @mkdir($dir, 0777, true);

    $cover = "$base/public/images/cards/$slug.jpg";
    if (file_exists($cover)) { copy($cover, "$dir/cover.jpg"); }
    $shotTags = [];
    foreach (($galleries[$slug] ?? []) as $gi => $g) {
        $src = "$base/public/" . $g[0];
        $shot = 'shot' . ($gi + 1) . '.jpg';
        if (file_exists($src)) { copy($src, "$dir/$shot"); }
        $shotTags[] = '<figure class="shot reveal"><img src="' . $shot . '" alt="' . e($g[1]) . '" loading="lazy"><figcaption>' . e($g[1]) . '</figcaption></figure>';
    }

    [$loginTitle, $idLabel] = $loginLabels[$slug] ?? ['User Login', 'User ID'];
    $name = e($p['name']);
    $tag = e($p['tagline']);
    $initial = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $p['name']), 0, 1));
    $css = sharedCss($p['gradient']);
    $js = sharedJs() . "\n" . siteBotJs($p, $loginTitle);
    $footer = footerHtml($name);
    $desc = e($p['description']);
    $long = e($p['long_description']);
    $category = e($p['category']);

    $stats = '';
    foreach ($p['stats'] as $s) {
        $stats .= '<div><b data-count="' . e($s['number']) . '">' . e($s['number']) . '</b><span>' . e($s['label']) . '</span></div>';
    }
    $benefitCards = '';
    foreach ($p['benefits'] ?? [] as $i => $b) {
        $benefitCards .= '<div class="card reveal"><div class="dot">' . ($i + 1) . '</div><h3>' . e($b['title']) . '</h3><p>' . e($b['text']) . '</p></div>';
    }
    $features = '';
    foreach ($p['features'] as $f) { $features .= '<li class="reveal">' . e($f) . '</li>'; }
    $steps = '';
    foreach ($p['how_it_works'] ?? [] as $i => $s) {
        $steps .= '<div class="step reveal"><div class="step-n">' . ($i + 1) . '</div><div><h3>' . e($s['title']) . '</h3><p>' . e($s['text']) . '</p></div></div>';
    }
    $chips = '';
    foreach ($p['use_cases'] ?? [] as $u) { $chips .= '<span class="chip">' . e($u) . '</span>'; }
    $quote = '';
    if (!empty($p['testimonial'])) {
        $t = $p['testimonial'];
        $quote = '<div class="quote reveal"><blockquote>“' . e($t['quote']) . '”</blockquote><div class="who"><b>' . e($t['author']) . '</b><span>' . e($t['role']) . ', ' . e($t['company']) . '</span></div></div>';
    }
    $faq = '';
    foreach ($p['faq'] ?? [] as $q) {
        $faq .= '<details class="reveal"><summary>' . e($q['q']) . '</summary><p>' . e($q['a']) . '</p></details>';
    }
    $tech = '';
    $marquee = '';
    foreach ($p['tech'] as $t) { $tech .= '<span>' . e($t) . '</span>'; $marquee .= '<span>' . e($t) . '</span>'; }
    $marqueeTrack = $marquee . $marquee;
    [$widgetBlock, $widgetJs] = buildWidget($slug, $widgets);
    $galleryGrid = implode('', $shotTags);
    $galleryPreview = implode('', array_slice($shotTags, 0, 3));
    $reviews = buildReviews($slug, $p['name'], $reviewNames, $reviewPersonas, $specificReviews, $genericReviews);
    $avgRating = round(array_sum(array_column($reviews, 'rating')) / count($reviews), 1);
    $reviewCount = count($reviews);
    $reviewsAll = reviewsHtml($reviews);
    $reviewsPreview = reviewsHtml(array_slice($reviews, 0, 3));

    // Feature preview for home (first 4)
    $featPreview = '';
    foreach (array_slice($p['features'], 0, 4) as $x) { $featPreview .= '<li class="reveal">' . e($x) . '</li>'; }

    // Generic Before/After comparison
    $comparison = <<<HTML
<div class="cmp-wrap reveal"><table class="cmp">
  <thead><tr><th>Aspect</th><th>Without {$name}</th><th>With {$name}</th></tr></thead>
  <tbody>
    <tr><td>Getting started</td><td class="no">Weeks of setup and configuration</td><td class="yes">Live in days with guided onboarding</td></tr>
    <tr><td>Daily work</td><td class="no">Manual entry, spreadsheets, follow-ups</td><td class="yes">Automated workflows and AI assistance</td></tr>
    <tr><td>Visibility</td><td class="no">Month-end surprises and guesswork</td><td class="yes">Real-time dashboards and instant alerts</td></tr>
    <tr><td>Errors</td><td class="no">Human slips that cost money</td><td class="yes">Validations and checks on every step</td></tr>
    <tr><td>Support</td><td class="no">You are on your own</td><td class="yes">Dedicated team, WhatsApp support &amp; SLA</td></tr>
    <tr><td>Cost</td><td class="no">Hidden overruns and surprise bills</td><td class="yes">Transparent plans that scale with you</td></tr>
  </tbody>
</table></div>
HTML;

    // First 90 days timeline
    $journey = <<<HTML
<div class="steps">
  <div class="step reveal"><div class="step-n">1</div><div><h3>Day 1 — Kickoff &amp; Setup</h3><p>Your account is provisioned, branding applied, and your data import begins. You meet your dedicated onboarding specialist the same day.</p></div></div>
  <div class="step reveal"><div class="step-n">2</div><div><h3>Week 1 — Onboarding &amp; Training</h3><p>Hands-on training sessions for every user role, in plain language. Your existing data is migrated, verified, and signed off by your team.</p></div></div>
  <div class="step reveal"><div class="step-n">3</div><div><h3>Month 1 — Full Adoption</h3><p>{$name} becomes part of the daily routine. We fine-tune settings from real usage, and weekly check-ins remove any friction fast.</p></div></div>
  <div class="step reveal"><div class="step-n">4</div><div><h3>Quarter 1 — Measurable ROI</h3><p>A business review with real numbers: time saved, errors reduced, growth unlocked. From here, quarterly reviews keep the value compounding.</p></div></div>
</div>
HTML;

    // Security cards
    $security = <<<HTML
<div class="cards" style="text-align:left">
  <div class="card reveal"><div class="dot">🔒</div><h3>Encrypted Everywhere</h3><p>All data is encrypted in transit (TLS 1.2+) and at rest (AES-256). Backups run daily with point-in-time recovery.</p></div>
  <div class="card reveal"><div class="dot">👤</div><h3>Role-Based Access</h3><p>Every user sees exactly what their role allows — with full audit logs of who did what, and when.</p></div>
  <div class="card reveal"><div class="dot">🏢</div><h3>Your Infrastructure, If You Prefer</h3><p>Cloud-hosted by default; Enterprise plans support on-premise or private-cloud deployment inside your own network.</p></div>
</div>
HTML;

    // Pricing FAQ
    $pricingFaq = <<<HTML
<details class="reveal"><summary>Why is pricing "Custom"?</summary><p>Because paying for what you don't use is unfair. Pricing depends on your team size, usage volume, and modules — tell us your scale and you'll have an exact, written quote within 48 hours. No hidden charges, ever.</p></details>
<details class="reveal"><summary>Do you provide GST invoices?</summary><p>Yes — proper GST tax invoices for every payment, monthly or annual. Annual billing includes a discount.</p></details>
<details class="reveal"><summary>Can we cancel anytime? What happens to our data?</summary><p>Monthly plans cancel anytime with no lock-in. Your data is always yours — we provide a full export in standard formats within 7 days of any cancellation request.</p></details>
<details class="reveal"><summary>Is onboarding and training really free?</summary><p>Yes. Every plan includes guided onboarding, role-based training sessions, and assisted data migration at no extra cost — because a product you can't adopt is worthless.</p></details>
HTML;

    // Contact response cards
    $responseCards = <<<HTML
<div class="cards" style="text-align:left">
  <div class="card reveal"><div class="dot">⚡</div><h3>WhatsApp — under 15 min</h3><p>During business hours (Mon–Sat, 9 AM–8 PM IST), WhatsApp messages get a human reply in minutes, not days.</p></div>
  <div class="card reveal"><div class="dot">✉</div><h3>Email — under 24 hours</h3><p>Every email gets a substantive reply within one business day — usually much faster.</p></div>
  <div class="card reveal"><div class="dot">🛡</div><h3>Critical Issues — SLA-backed</h3><p>Enterprise customers get an SLA with 4-hour response on critical issues, 24/7 — with escalation contacts that actually answer.</p></div>
</div>
HTML;

    // Trust strip (index)
    $trustStrip = <<<HTML
<div class="inc-strip reveal" style="margin-top:2.4rem">
  <span>Made in India 🇮🇳</span><span>GST-compliant billing</span><span>Data encrypted at rest</span><span>No lock-in, full data export</span><span>500+ projects by KA Software</span>
</div>
HTML;

    // Integrations (features page)
    $integrations = '';
    foreach (array_merge($p['tech'], ['WhatsApp Business API', 'Excel Import/Export', 'REST API & Webhooks', 'Email & SMS Alerts']) as $ig) {
        $integrations .= '<span class="chip">' . e($ig) . '</span>';
    }

    // Our Promise (about page)
    $promise = <<<HTML
<ul class="checklist">
  <li class="reveal">A written, fixed quote before you pay anything</li>
  <li class="reveal">Free onboarding, training and data migration on every plan</li>
  <li class="reveal">Your data is always exportable — no lock-in, ever</li>
  <li class="reveal">A human replies on WhatsApp within minutes in business hours</li>
  <li class="reveal">Statutory and security updates included, not sold separately</li>
  <li class="reveal">If {$name} is not the right fit, we will tell you honestly</li>
</ul>
HTML;

    // Contact mini-FAQ
    $contactFaq = <<<HTML
<details class="reveal"><summary>How long is a demo?</summary><p>About 30 minutes — a live walkthrough of {$name} focused on your use case, with time for every question. Online or at your premises in Chennai.</p></details>
<details class="reveal"><summary>Which languages do you support?</summary><p>Our team supports you in English and Tamil (Hindi on request). Product interfaces are in English, with local-language support where the product offers it.</p></details>
<details class="reveal"><summary>We're outside Chennai — can you still serve us?</summary><p>Absolutely. Most of our customers are served fully remotely across India, with online onboarding, training and support. On-site visits are available for Enterprise rollouts.</p></details>
HTML;

    // Guides (resources page) - 5 expandable articles built from product data
    $g1steps = '';
    foreach ($p['how_it_works'] ?? [] as $i => $s) {
        $g1steps .= '<b>' . ($i + 1) . '. ' . e($s['title']) . ':</b> ' . e($s['text']) . '<br>';
    }
    $g2points = '';
    foreach (array_slice($p['benefits'] ?? [], 0, 3) as $b) {
        $g2points .= '<b>' . e($b['title']) . '.</b> ' . e($b['text']) . '<br>';
    }
    $gLastFeats = '';
    foreach (array_slice($p['features'], -3) as $x) { $gLastFeats .= '<b>· ' . e($x) . '</b><br>'; }
    $guidesHtml = <<<HTML
<details class="reveal"><summary>Getting started with {$name}: a practical checklist <em class="gmeta">4 min read</em></summary>
<p>The fastest rollouts we see share one habit: they treat week one as a project with an owner. Name one person on your side as the {$name} champion, give them this checklist, and you will be live before most companies finish their first internal meeting.<br><br>{$g1steps}<br>Two practical tips from hundreds of rollouts: start with one team or location rather than everyone at once, and schedule the training session in the first week while enthusiasm is high. Our onboarding specialist drives all of this with you — the checklist is simply so you know what good looks like.</p></details>
<details class="reveal"><summary>How {$name} pays for itself: the ROI breakdown <em class="gmeta">3 min read</em></summary>
<p>Software should be an investment, not an expense. Here is where the return actually comes from:<br><br>{$g2points}<br>Add these together and most customers see the subscription cost recovered within the first one to two months. On your demo call, ask us to run the numbers with your actual volumes — we will show the working, not just the conclusion.</p></details>
<details class="reveal"><summary>Rolling out {$name} without team resistance <em class="gmeta">4 min read</em></summary>
<p>New software fails when the team feels it was done <i>to</i> them, not <i>for</i> them. The fix is simple and almost never done: involve the actual daily users before go-live, not after.<br><br><b>1. Show, don't announce.</b> Let your team see the demo too — people support what they helped choose.<br><b>2. Start with the pain.</b> Lead the rollout with the task everyone hates most; when {$name} removes it in week one, adoption sells itself.<br><b>3. Name a champion.</b> One enthusiastic user per team answers the small questions faster than any helpdesk.<br><b>4. Keep the old system read-only for a month.</b> A safety net removes fear — and nobody ever goes back to it.<br><br>Our training sessions are built around this playbook, in plain language, in English or Tamil.</p></details>
<details class="reveal"><summary>The security checklist your IT team will ask about <em class="gmeta">3 min read</em></summary>
<p>Sooner or later, someone senior asks "is our data safe in {$name}?" Here are the answers, ready to forward:<br><br><b>Encryption:</b> TLS 1.2+ in transit, AES-256 at rest.<br><b>Access:</b> Role-based permissions with full audit logs of every action.<br><b>Backups:</b> Automated daily backups with point-in-time recovery.<br><b>Data ownership:</b> Your data is yours — full export in standard formats, anytime, and within 7 days of any cancellation.<br><b>Deployment:</b> Cloud by default; private-cloud and on-premise available on Enterprise plans for regulated industries.<br><br>Need a formal security questionnaire filled in? Send it to info@kasoftware.in — completed documentation usually goes back within three business days.</p></details>
<details class="reveal"><summary>Features you might be missing in {$name} <em class="gmeta">2 min read</em></summary>
<p>Long-time users tell us the same thing: the features they discovered late are the ones they now use daily. Check whether your team is using these:<br><br>{$gLastFeats}<br>Every plan includes all of these — no upsell. If you would like a 20-minute "power user" session for your team to unlock them, ask on WhatsApp and we will schedule one free.</p></details>
HTML;

    // ---------- index.html ----------
    $nav = navHtml($name, $initial, 'index', $loginTitle);
    $topBenefits = '';
    foreach (array_slice($p['benefits'] ?? [], 0, 3) as $i => $b) {
        $topBenefits .= '<div class="card reveal"><div class="dot">' . ($i + 1) . '</div><h3>' . e($b['title']) . '</h3><p>' . e($b['text']) . '</p></div>';
    }
    $body = <<<HTML
<section class="hero">
  <div class="blob b1"></div><div class="blob b2"></div>
  <div class="container hero-grid">
    <div>
      <div class="tag">{$category}</div>
      <h1>{$name}</h1>
      <p class="lead">{$tag}. {$desc}</p>
      <div class="hero-cta">
        <a href="login.html" class="btn btn-white">{$loginTitle}</a>
        <a href="about.html" class="btn btn-ghost">Explore {$name}</a>
      </div>
      <div class="hero-stats">{$stats}</div>
    </div>
    <div class="hero-photo"><img src="cover.jpg" alt="{$name}"></div>
  </div>
</section>

<div class="marquee"><div class="marquee-track">{$marqueeTrack}</div></div>

<div class="container">{$trustStrip}</div>

<section>
  <div class="container center">
    <span class="sec-badge">Why {$name}</span>
    <h2 class="sec-title">Loved For a Reason</h2>
    <div class="cards" style="text-align:left">{$topBenefits}</div>
    <p style="margin-top:2rem"><a href="about.html" class="btn btn-outline">Read the Full Story →</a></p>
  </div>
</section>

<section style="background:linear-gradient(180deg,#f6f8fc,#eef4ff)">
  <div class="container">
    <span class="sec-badge">What You Get</span>
    <h2 class="sec-title">Highlights</h2>
    <ul class="checklist">{$featPreview}</ul>
    <p style="margin-top:1.8rem"><a href="features.html" class="btn btn-outline">All Features →</a></p>
  </div>
</section>

<section style="background:linear-gradient(180deg,#eef4ff,#f6f8fc)">
  <div class="container">
    <span class="sec-badge">Interactive Demo</span>
    <h2 class="sec-title">Experience It Right Here</h2>
    {$widgetBlock}
  </div>
</section>

<section>
  <div class="container center">
    <span class="sec-badge">In Action</span>
    <h2 class="sec-title">{$name} in the Real World</h2>
    <div class="shots">{$galleryPreview}</div>
    <p style="margin-top:2rem"><a href="gallery.html" class="btn btn-outline">View Full Gallery →</a></p>
  </div>
</section>

<section style="background:linear-gradient(180deg,#eef4ff,#f6f8fc)">
  <div class="container center">
    <span class="sec-badge">Reviews</span>
    <h2 class="sec-title">Rated {$avgRating} ★ by {$reviewCount} Customers</h2>
    <div class="rev-grid" style="text-align:left">{$reviewsPreview}</div>
    <p style="margin-top:1.4rem"><a href="reviews.html" class="btn btn-outline">Read All {$reviewCount} Reviews →</a></p>
  </div>
</section>

<section style="background:linear-gradient(180deg,#f6f8fc,#eef4ff)">
  <div class="container">
    {$quote}
    <div class="cta-band reveal" style="margin-top:2.4rem">
      <h2>Ready to get started with {$name}?</h2>
      <p>Free demo within 48 hours · Call +91 80566 53499</p>
      <a href="contact.html" class="btn btn-white">Request a Demo</a>
    </div>
  </div>
</section>
HTML;
    file_put_contents("$dir/index.html", pageShell("$name — $tag", $desc, $css, $nav, $body, $footer, $js, $widgetJs));

    // ---------- about.html ----------
    $nav = navHtml($name, $initial, 'about', $loginTitle);
    $body = pageHero($name, "About $name", $tag) . <<<HTML
<section>
  <div class="container">
    <span class="sec-badge">The Product</span>
    <h2 class="sec-title">What is <span class="grad-text">{$name}</span>?</h2>
    <p class="sec-desc">{$long}</p>
    <div class="tech">{$tech}</div>
  </div>
</section>
<section style="background:linear-gradient(180deg,#eef4ff,#f6f8fc)">
  <div class="container center">
    <span class="sec-badge">Why Teams Choose Us</span>
    <h2 class="sec-title">Built to Make a Difference</h2>
    <div class="cards" style="text-align:left">{$benefitCards}</div>
  </div>
</section>
<section style="background:linear-gradient(180deg,#f6f8fc,#eef4ff)">
  <div class="container">
    <span class="sec-badge">Our Promise</span>
    <h2 class="sec-title">Six Things We Guarantee</h2>
    {$promise}
  </div>
</section>
<section>
  <div class="container">
    <span class="sec-badge">Your First 90 Days</span>
    <h2 class="sec-title">From Signup to ROI</h2>
    {$journey}
  </div>
</section>
<section style="background:linear-gradient(180deg,#eef4ff,#f6f8fc)">
  <div class="container center">
    <span class="sec-badge">Security &amp; Privacy</span>
    <h2 class="sec-title">Your Data, Protected</h2>
    {$security}
  </div>
</section>
<section>
  <div class="container">
    {$quote}
    <div class="cta-band reveal" style="margin-top:2.4rem">
      <h2>See {$name} live</h2>
      <p>We'll walk you through it on a call — no commitment.</p>
      <a href="contact.html" class="btn btn-white">Book a Walkthrough</a>
    </div>
  </div>
</section>
HTML;
    file_put_contents("$dir/about.html", pageShell("About — $name", $desc, $css, $nav, $body, $footer, $js));

    // ---------- features.html ----------
    $nav = navHtml($name, $initial, 'features', $loginTitle);
    $body = pageHero($name, 'Features', "Everything $name does for you, and how it works.") . <<<HTML
<section>
  <div class="container">
    <span class="sec-badge">Features</span>
    <h2 class="sec-title">Everything Included</h2>
    <ul class="checklist">{$features}</ul>
  </div>
</section>
<section style="background:linear-gradient(180deg,#f6f8fc,#eef4ff)">
  <div class="container">
    <span class="sec-badge">The Difference</span>
    <h2 class="sec-title">Before vs After {$name}</h2>
    {$comparison}
  </div>
</section>
<section>
  <div class="container">
    <span class="sec-badge">Integrations</span>
    <h2 class="sec-title">Plays Well With Your Tools</h2>
    <p class="sec-desc">Built on a modern stack, connected to the tools your business already runs on.</p>
    <div class="chips">{$integrations}</div>
  </div>
</section>
<section style="background:linear-gradient(180deg,#eef4ff,#f6f8fc)">
  <div class="container">
    <span class="sec-badge">How It Works</span>
    <h2 class="sec-title">From Zero to Running</h2>
    <div class="steps">{$steps}</div>
  </div>
</section>
<section>
  <div class="container">
    <span class="sec-badge">Who It's For</span>
    <h2 class="sec-title">Perfect For</h2>
    <div class="chips">{$chips}</div>
  </div>
</section>
<section style="background:linear-gradient(180deg,#f6f8fc,#eef4ff)">
  <div class="container">
    <span class="sec-badge">FAQ</span>
    <h2 class="sec-title">Common Questions</h2>
    <div style="max-width:780px;margin-top:2rem">{$faq}</div>
  </div>
</section>
HTML;
    file_put_contents("$dir/features.html", pageShell("Features — $name", $desc, $css, $nav, $body, $footer, $js));

    // ---------- gallery.html ----------
    $nav = navHtml($name, $initial, 'gallery', $loginTitle);
    $body = pageHero($name, 'Gallery', "$name in the real world — with the people who use it every day.") . <<<HTML
<section>
  <div class="container">
    <div class="shots" style="margin-top:0">{$galleryGrid}</div>
  </div>
</section>
<section style="padding-top:0">
  <div class="container">
    <div class="cta-band reveal">
      <h2>Want to see it with your own data?</h2>
      <p>We'll set up a personalised demo within 48 hours.</p>
      <a href="contact.html" class="btn btn-white">Request a Demo</a>
    </div>
  </div>
</section>
HTML;
    file_put_contents("$dir/gallery.html", pageShell("Gallery — $name", $desc, $css, $nav, $body, $footer, $js));

    // ---------- reviews.html ----------
    $nav = navHtml($name, $initial, 'reviews', $loginTitle);
    $body = pageHero($name, 'Customer Reviews', "What $reviewCount teams and families say about $name — in their own words.") . <<<HTML
<section>
  <div class="container">
    <div class="rev-summary reveal">
      <div><span class="big">{$avgRating}</span></div>
      <div><div class="rstars">★★★★★</div><div class="rmeta">Average rating from {$reviewCount} verified customers</div></div>
      <div class="rmeta">100% would recommend {$name} to a peer</div>
    </div>
    <div class="rev-grid">{$reviewsAll}</div>
    <div class="cta-band reveal" style="margin-top:2.4rem">
      <h2>Become our next happy customer</h2>
      <p>Free demo within 48 hours · No commitment</p>
      <a href="contact.html" class="btn btn-white">Request a Demo</a>
    </div>
  </div>
</section>
HTML;
    file_put_contents("$dir/reviews.html", pageShell("Reviews — $name", $desc, $css, $nav, $body, $footer, $js));

    // ---------- resources.html (Guides) ----------
    $nav = navHtml($name, $initial, 'resources', $loginTitle);
    $body = pageHero($name, 'Guides & Resources', "Practical, no-fluff guides for getting the most out of $name — written from real rollouts.") . <<<HTML
<section>
  <div class="container">
    <div style="max-width:840px;margin-top:.5rem">{$guidesHtml}</div>
    <div class="cta-band reveal" style="margin-top:2.6rem">
      <h2>Want a guide walked through live?</h2>
      <p>Our team runs free 20-minute sessions on any of these topics for your team.</p>
      <a href="contact.html" class="btn btn-white">Book a Session</a>
    </div>
  </div>
</section>
HTML;
    file_put_contents("$dir/resources.html", pageShell("Guides — $name", $desc, $css, $nav, $body, $footer, $js));

    // ---------- pricing.html ----------
    $nav = navHtml($name, $initial, 'pricing', $loginTitle);
    $f = $p['features'];
    $planA = ''; foreach (array_slice($f, 0, 3) as $x) { $planA .= '<li>' . e($x) . '</li>'; }
    $planB = ''; foreach (array_slice($f, 0, 5) as $x) { $planB .= '<li>' . e($x) . '</li>'; }
    $planC = ''; foreach ($f as $x) { $planC .= '<li>' . e($x) . '</li>'; }
    $body = pageHero($name, 'Pricing', 'Simple plans that grow with you. All prices are customised to your scale — talk to us for an exact quote.') . <<<HTML
<section>
  <div class="container">
    <div class="plans">
      <div class="plan reveal">
        <h3>Starter</h3><div class="pfor">For small teams getting going</div>
        <div class="pprice">Custom <small>/ month</small></div>
        <ul>{$planA}<li>Email support</li><li>Onboarding assistance</li></ul>
        <a href="contact.html" class="btn btn-outline" style="width:100%">Get Starter Quote</a>
      </div>
      <div class="plan pop reveal">
        <div class="pbadge">Most Popular</div>
        <h3>Professional</h3><div class="pfor">For growing businesses</div>
        <div class="pprice">Custom <small>/ month</small></div>
        <ul>{$planB}<li>Priority WhatsApp support</li><li>Quarterly business reviews</li></ul>
        <a href="contact.html" class="btn btn-primary" style="width:100%">Get Pro Quote</a>
      </div>
      <div class="plan reveal">
        <h3>Enterprise</h3><div class="pfor">For large organisations</div>
        <div class="pprice">Custom <small>/ year</small></div>
        <ul>{$planC}<li>Dedicated account manager</li><li>SLA-backed support &amp; on-premise options</li></ul>
        <a href="contact.html" class="btn btn-outline" style="width:100%">Talk to Sales</a>
      </div>
    </div>
    <p style="text-align:center;color:var(--soft);font-size:.85rem;margin-top:1.8rem">Every plan includes:</p>
    <div class="inc-strip"><span>Free onboarding</span><span>Role-based training</span><span>Data migration</span><span>Regular updates</span><span>GST invoices</span></div>
  </div>
</section>
<section style="background:linear-gradient(180deg,#f6f8fc,#eef4ff)">
  <div class="container">
    <span class="sec-badge">Pricing FAQ</span>
    <h2 class="sec-title">Fair Questions, Straight Answers</h2>
    <div style="max-width:780px;margin-top:2rem">{$pricingFaq}</div>
  </div>
</section>
HTML;
    file_put_contents("$dir/pricing.html", pageShell("Pricing — $name", $desc, $css, $nav, $body, $footer, $js));

    // ---------- contact.html ----------
    $nav = navHtml($name, $initial, 'contact', $loginTitle);
    $waName = rawurlencode($p['name']);
    $body = pageHero($name, 'Contact Us', 'Questions, demos, pricing — we reply within 24 hours.') . <<<HTML
<section>
  <div class="container">
    <div class="contact-cards">
      <div class="ccard reveal"><div class="ci">✆</div><b>Call Us</b><a href="tel:+918056653499">+91 80566 53499</a></div>
      <div class="ccard reveal"><div class="ci">✉</div><b>Email</b><a href="mailto:info@kasoftware.in">info@kasoftware.in</a></div>
      <div class="ccard reveal"><div class="ci">✦</div><b>WhatsApp</b><a href="https://wa.me/918056653499?text=Hi!%20I%27m%20interested%20in%20{$waName}" target="_blank" rel="noopener">Chat with us</a></div>
      <div class="ccard reveal"><div class="ci">⌂</div><b>Visit</b><span>Anna Nagar, Chennai - 600049, India</span></div>
    </div>
    <div style="margin-top:3rem">
      <span class="sec-badge">Response Times</span>
      <h2 class="sec-title">How Fast We Reply</h2>
      {$responseCards}
    </div>
    <div style="margin-top:3rem">
      <span class="sec-badge">Quick Questions</span>
      <h2 class="sec-title">Before You Reach Out</h2>
      <div style="max-width:780px;margin-top:1.6rem">{$contactFaq}</div>
    </div>
    <div class="cta-band reveal" style="margin-top:2.6rem">
      <h2>Request a {$name} demo</h2>
      <p>Tell us about your needs on the main contact form — mention "{$name}" and we'll tailor the demo.</p>
      <a href="https://kasoftware.in/#contact" class="btn btn-white">Open Contact Form</a>
    </div>
  </div>
</section>
HTML;
    file_put_contents("$dir/contact.html", pageShell("Contact — $name", $desc, $css, $nav, $body, $footer, $js));

    // ---------- login.html ----------
    $loginCss = <<<CSS
.login-wrap{min-height:100vh;display:flex;align-items:center;justify-content:center;background:var(--pgrad);padding:1.5rem;position:relative;overflow:hidden}
.login-wrap::before,.login-wrap::after{content:'';position:absolute;border-radius:50%;background:rgba(255,255,255,.12);filter:blur(80px)}
.login-wrap::before{width:420px;height:420px;top:-140px;right:-100px}
.login-wrap::after{width:340px;height:340px;bottom:-120px;left:-80px}
.login-card{position:relative;z-index:1;width:100%;max-width:410px;background:rgba(255,255,255,.95);backdrop-filter:blur(16px);border-radius:1.5rem;padding:2.6rem 2.2rem;box-shadow:0 24px 60px rgba(11,18,32,.35);animation:up .7s cubic-bezier(.22,1,.36,1) both}
@keyframes up{from{opacity:0;transform:translateY(28px)}to{opacity:1;transform:none}}
.login-card .brand{justify-content:center;margin-bottom:.4rem;display:flex}
.login-card h1{font-size:1.35rem;text-align:center;margin-bottom:.35rem}
.login-card .sub{text-align:center;color:var(--soft);font-size:.88rem;margin-bottom:1.8rem}
.field{margin-bottom:1.1rem}
.field label{display:block;font-size:.85rem;font-weight:600;color:#14203a;margin-bottom:.4rem}
.field input{width:100%;padding:.85rem 1rem;border:1px solid rgba(15,23,42,.14);border-radius:.9rem;font-size:.95rem;font-family:inherit;background:#f8fafc}
.field input:focus{outline:none;border-color:var(--blue);box-shadow:0 0 0 3px rgba(37,99,235,.12);background:#fff}
.err{display:none;background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;font-size:.86rem;padding:.7rem 1rem;border-radius:.8rem;margin-bottom:1.1rem}
.err.show{display:block;animation:shake .4s}
@keyframes shake{0%,100%{transform:translateX(0)}25%{transform:translateX(-7px)}75%{transform:translateX(7px)}}
.login-card .btn{width:100%}
.back{display:block;text-align:center;margin-top:1.4rem;font-size:.85rem;color:var(--soft)}
.back:hover{color:var(--blue)}
CSS;
    $login = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$loginTitle} — {$name}</title>
<style>{$css}
{$loginCss}</style>
</head>
<body>
<div class="login-wrap">
  <div class="login-card">
    <a href="index.html" class="brand"><span class="brand-mark">{$initial}</span> {$name}</a>
    <h1>{$loginTitle}</h1>
    <p class="sub">Sign in to continue to {$name}</p>
    <div class="err" id="err">Invalid {$idLabel} or password. Please check your credentials and try again.</div>
    <form id="loginForm" autocomplete="off">
      <div class="field">
        <label for="uid">{$idLabel}</label>
        <input type="text" id="uid" placeholder="Enter your {$idLabel}" required>
      </div>
      <div class="field">
        <label for="pwd">Password</label>
        <input type="password" id="pwd" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
    <a class="back" href="index.html">← Back to {$name}</a>
  </div>
</div>
<script>
document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var btn = this.querySelector('button');
    var err = document.getElementById('err');
    err.classList.remove('show');
    btn.disabled = true;
    btn.textContent = 'Signing in...';
    setTimeout(function () {
        btn.disabled = false;
        btn.textContent = 'Sign In';
        void err.offsetWidth;
        err.classList.add('show');
        document.getElementById('pwd').value = '';
    }, 900);
});
</script>
</body>
</html>
HTML;
    file_put_contents("$dir/login.html", $login);

    echo $slug, ": 7 pages + 7 images\n";
}
echo "All multi-page product sites generated.\n";
