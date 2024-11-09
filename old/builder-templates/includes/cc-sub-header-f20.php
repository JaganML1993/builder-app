
<section id="subHeaderSection" class="wow fadeInDown" data-wow-delay="200ms">
    <nav class="navbar navbar-expand-xl" aria-label="Sub Header navbar">
        <div class="container-fluid px-0">
             <span class="sub-header-title ms-2"> Flatworld</span>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#subHeaderSectionNav" aria-controls="subHeaderSectionNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon">
             <i class="fa-solid fa-angle-up"></i>
             </span>
             </button>
			<div class="collapse navbar-collapse multicolumn-dropdown" id="subHeaderSectionNav">
			<ul class="navbar-nav me-auto mb-md-0 mx-md-1">
			<li class="nav-item dropdown position-static">
				<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Inbound_Call_Center') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Inbound</a>
				<div class="dropdown-menu h-auto"> 
				 <ul class="full-width-col">
				<li><a class="dropdown-item <?php if($path == "/call-center/inbound-call-center-services/default.php") echo 'active'; ?>" href="/call-center/inbound-call-center-services/">Inbound Call Center Services</a></li>
				<li><a class="dropdown-item <?php if($page == "800-answering-services") echo 'active'; ?>" href="/call-center/800-answering-services.php">800 Answering Services</a></li>
				<li><a class="dropdown-item <?php if($page == "claims-processing-services") echo 'active'; ?>" href="/call-center/claims-processing-services.php">Claims Processing Services</a></li>
				<li><a class="dropdown-item <?php if($page == "order-taking-services") echo 'active'; ?>" href="/call-center/order-taking-services.php">Order Taking Services</a></li>
				<li><a class="dropdown-item <?php if($page == "product-information-request-services") echo 'active'; ?>" href="/call-center/product-information-services.php">Product Information Request Services</a></li>
				<li><a class="dropdown-item <?php if($page == "rebate-processing-services") echo 'active'; ?>" href="/call-center/rebate-processing-services.php">Rebate Processing Services</a></li>
				<li><a class="dropdown-item <?php if($page == "product-recall-management-services") echo 'active'; ?>" href="/call-center/product-recall-management-services.php">Product Recall Management Services</a></li>
				<li><a class="dropdown-item <?php if($page == "interactive-voice-response") echo 'active'; ?>" href="/call-center/interactive-voice-response.php">IVR Services</a></li>
				<li><a class="dropdown-item <?php if($page == "enquiry-handling-services") echo 'active'; ?>" href="/call-center/enquiry-handling-services.php">Enquiry Handling Services</a></li>
				<li><a class="dropdown-item <?php if($page == "billing-query-services") echo 'active'; ?>" href="/call-center/billing-query-services.php">Billing Query Services</a></li>
				<li><a class="dropdown-item <?php if($page == "reservation-booking-services") echo 'active'; ?>" href="/call-center/reservation-booking-services.php">Reservation Booking Services</a></li>
				<li><a class="dropdown-item <?php if($page == "omnichannel-contact-center-services") echo 'active'; ?>" href="/call-center/omnichannel-contact-center-services.php">Omnichannel Contact Center Services</a></li>
				<li><a class="dropdown-item <?php if($page == "inbound-sales-services") echo 'active'; ?>" href="/call-center/inbound-sales-services.php">Inbound Sales Services</a></li>
				<li><a class="dropdown-item <?php if($page == "consumer-response-services") echo 'active'; ?>" href="/call-center/consumer-response-services.php">Consumer Response Services</a></li>
				<li><a class="dropdown-item <?php if($page == "sales-management-services") echo 'active'; ?>" href="/call-center/sales-management-services.php">Sales Management Services</a></li>
				<li><a class="dropdown-item <?php if($page == "hotline-services") echo 'active'; ?>" href="/call-center/hotline-services.php">Hotline Services</a></li>
				</ul>
				</div>
			</li>
			
			<li class="nav-item dropdown position-static">
			   <a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Outbound_Call_Center') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Outbound</a>
				<div class="dropdown-menu h-auto"> 
				<ul class="full-width-col">
				<li><a class="dropdown-item"  href="/call-center/outbound-callcenter-services.php">Outbound call center services</a></li>
				<li><a class="dropdown-item <?php if($page == "market-intelligence-services") echo 'active'; ?>" href="/call-center/market-intelligence-services.php">Market Intelligence Services</a></li>
				<li><a class="dropdown-item <?php if($page == "cati-services") echo 'active'; ?>" href="/call-center/cati-services.php">CATI Services</a></li> 
				<li><a class="dropdown-item <?php if($page == "customer-follow-up-services") echo 'active'; ?>" href="/call-center/customer-follow-up-services.php">Customer Follow up Services</a></li>
				<li><a class="dropdown-item <?php if($page == "direct-mail-follow-up-services") echo 'active'; ?>" href="/call-center/direct-mail-services.php">Direct Mail Follow up Services</a></li>
				<li><a class="dropdown-item <?php if($page == "customer-satisfaction-survey-services") echo 'active'; ?>" href="/call-center/customer-satisfaction-surveys.php">Customer Satisfaction Survey Services</a></li>
				<li><a class="dropdown-item <?php if($page == "product-promotion-services") echo 'active'; ?>" href="/call-center/product-promotion-services.php">Product Promotion Services</a></li>
				<li><a class="dropdown-item <?php if($page == "customer-loyalty-management-services") echo 'active'; ?>" href="/call-center/customer-loyalty-management-services.php">Customer Loyalty Management Services</a></li>
				<li><a class="dropdown-item <?php if($page == "customer-acquisition-services") echo 'active'; ?>" href="/call-center/customer-acquisition-services.php">Telesales &amp; Customer Acquisition</a></li>
				<li><a class="dropdown-item <?php if($page == "disaster-recovery-services") echo 'active'; ?>" href="/call-center/disaster-recovery.php">Call Center Disaster Recovery Services</a></li>
				<li><a class="dropdown-item <?php if($page == "database-development-management-services") echo 'active'; ?>" href="/call-center/database-development-management-services.php">Database Development &amp; Management Services</a></li>
				<li><a class="dropdown-item <?php if($page == "debt-collection-services") echo 'active'; ?>" href="/call-center/debt-collection-services.php">Debt Collection Services</a></li>								
				<li><a class="dropdown-item <?php if($page == "subscription-renewal-services") echo 'active'; ?>" href="/call-center/subscription-renewal-services.php">Subscription Renewal Services</a></li>
				<li><a class="dropdown-item <?php if($page == "customer-retention-services") echo 'active'; ?>" href="/call-center/customer-retention-services.php">Customer Retention Services</a></li>
				<li><a class="dropdown-item <?php if($page == "data-validation-services") echo 'active'; ?>" href="/call-center/data-validation-services.php">Data Validation Services</a></li>
				<li><a class="dropdown-item <?php if($page == "email-list-management-services") echo 'active'; ?>" href="/call-center/email-list-management-services.php">Email List Management Services</a></li>
				<li><a class="dropdown-item <?php if($page == "outbound-calling-services") echo 'active'; ?>" href="/call-center/outbound-calling-services.php">Outbound Calling Services</a></li>
				<li><a class="dropdown-item <?php if($page == "up-selling-and-cross-selling-services") echo 'active'; ?>" href="/call-center/upselling-crossselling-services.php">Upselling and Cross-selling Services</a></li>
				</ul>
				</div>
			</li>

			<li class="nav-item dropdown position-static">
			<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Telemarketing_Services') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Telemarketing</a>
				<div class="dropdown-menu h-auto"> 
				<ul class="full-width-col">
					<li><a class="dropdown-item" href="/sales-marketing/telemarketing-services.php">Telemarketing Services</a></li>
					<li><a class="dropdown-item <?php if($page == "cold-calling-services") echo 'active'; ?>" href="/call-center/cold-calling-services.php">Cold Calling Services</a></li>
					<li><a class="dropdown-item <?php if($page == "b2b-cold-calling-services") echo 'active'; ?>" href="/call-center/b2b-cold-calling-services.php">B2B Cold Calling Services</a></li>
					<li><a class="dropdown-item <?php if($page == "real-estate-cold-calling-services") echo 'active'; ?>" href="/call-center/real-estate-cold-calling-services.php">Real Estate Cold Calling Services</a></li>						
					<li><a class="dropdown-item <?php if($page == "b2c-cold-calling-services") echo 'active'; ?>" href="/sales-marketing/b2c-cold-calling-services.php">B2C Cold Calling Services</a></li>
					<li><a class="dropdown-item <?php if($page == "cold-canvassing-services") echo 'active'; ?>" href="/call-center/cold-canvassing-services.php">Cold Canvassing Services</a></li>
					<li><a class="dropdown-item <?php if($page == "b2b-telesales-services") echo 'active'; ?>" href="/sales-marketing/b2b-telesales-services.php">B2B Telesales Services</a></li>
					<li><a class="dropdown-item <?php if($page == "teleprospecting-services") echo 'active'; ?>" href="/call-center/teleprospecting-services.php">Teleprospecting Services</a></li>
					<li><a class="dropdown-item <?php if($page == "telesales-customer-acquisition-services") echo 'active'; ?>" href="/sales-marketing/telesales-customer-acquisition-services.php">Telesales Customer Acquisition</a></li>
					<li><a class="dropdown-item <?php if($page == "insurance-telemarketing-services") echo 'active'; ?>" href="/call-center/insurance-telemarketing-services.php">Insurance Telemarketing Services</a></li>
					<li><a class="dropdown-item <?php if($page == "telecommunication-consulting-services") echo 'active'; ?>" href="/call-center/telecommunication-consulting-services.php">Telecommunication Consulting Services</a></li>
					<li><a class="dropdown-item <?php if($page == "commercial-insurance-telemarketing-services") echo 'active'; ?>" href="/call-center/commercial-insurance-telemarketing-services.php">Commercial Insurance Telemarketing Services</a></li>
				</ul>
				</div>
 			</li>
			<li class="nav-item dropdown position-static">
				<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Lead_Generation') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Lead Generation</a>
				<div class="dropdown-menu"> 
				<ul class="full-width-col">
					<li><a class="dropdown-item"  href="/sales-marketing/lead-generation-services.php">Lead Generation</a></li>
					<li><a class="dropdown-item <?php if($page == "outbound-lead-generation-services") echo 'active'; ?>" href="/call-center/outbound-lead-generation-services.php">Outbound Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "lead-generation-for-small-business") echo 'active'; ?>" href="/call-center/lead-generation-for-startups.php">Lead Generation for Startups</a></li>
					<li><a class="dropdown-item <?php if($page == "lead-generation-for-it-companies") echo 'active'; ?>" href="/call-center/lead-generation-for-it-companies.php">Lead Generation for IT Companies</a></li>
					<li><a class="dropdown-item <?php if($page == "real-estate-lead-generation-services") echo 'active'; ?>" href="/call-center/real-estate-lead-generation-services.php">Real Estate Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "b2b-lead-generation-services") echo 'active'; ?>" href="/call-center/b2b-lead-generation-services.php">B2B Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "ecommerce-lead-generation-services") echo 'active'; ?>" href="/call-center/ecommerce-lead-generation-services.php">e-Commerce Lead Generation</a></li>
					<li><a class="dropdown-item <?php if($page == "mortgage-lead-generation-services") echo 'active'; ?>" href="/call-center/mortgage-lead-generation-services.php">Mortgage Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "appointment-setting-services") echo 'active'; ?>" href="/sales-marketing/appointment-setting.php">Appointment Setting Services</a></li> 
					<li><a class="dropdown-item <?php if($page == "local-lead-generation-services") echo 'active'; ?>" href="/call-center/local-lead-generation-services.php">Local Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "b2c-appointment-setting-services") echo 'active'; ?>" href="/call-center/b2c-appointment-setting-services.php">B2C Appointment Setting Services</a></li>
					<li><a class="dropdown-item <?php if($page == "lead-qualification-services") echo 'active'; ?>" href="/call-center/lead-qualification-services.php">Lead Qualification Services</a></li>
					<li><a class="dropdown-item <?php if($page == "b2c-lead-generation-services") echo 'active'; ?>" href="/call-center/b2c-lead-generation-services.php">B2C Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "lead-generation-services-for-bfsi-industry") echo 'active'; ?>" href="/call-center/lead-generation-services-for-bfsi-industry.php">Lead Generation for BFSI Industry</a></li>
					<li><a class="dropdown-item <?php if($page == "telemarketing-lead-generation-services") echo 'active'; ?>" href="/call-center/telemarketing-lead-generation-services.php">Telemarketing Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "lead-generation-for-logistics-transportation-industry") echo 'active'; ?>" href="/call-center/lead-generation-for-logistics-transportation-industry.php">Lead Generation for the Logistics and Transportation Industry</a></li>
					<li><a class="dropdown-item <?php if($page == "lead-generation-for-travel-hospitality-industry") echo 'active'; ?>" href="/call-center/lead-generation-for-travel-hospitality-industry.php">Lead Generation for the Travel and Hospitality Industry</a></li>	
					<li><a class="dropdown-item <?php if($page == "education-sector-lead-generation-services") echo 'active'; ?>" href="/call-center/education-sector-lead-generation-services.php">Lead Generation Services for the Education Sector</a></li>	
					<li><a class="dropdown-item <?php if($page == "lead-generation-for-the-chemical-and-manufacturing-industry") echo 'active'; ?>" href="/call-center/lead-generation-for-the-chemical-and-manufacturing-industry.php">Lead Generation for the Chemical and Manufacturing Industry</a></li>
					<li><a class="dropdown-item <?php if($page == "soft-lead-generation-services") echo 'active'; ?>" href="/call-center/soft-lead-generation-services.php">Soft Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "b2b-appointment-setting-services") echo 'active'; ?>" href="/call-center/b2b-appointment-setting-services.php">B2B Appointment Setting Services</a></li>
					<li class="sub-heading"><a href="/insurance-bpo/insurance-lead-generation-services.php">Insurance Lead Generation</a></li>
					<li><a class="dropdown-item" href="/insurance-bpo/auto-insurance-lead-generation-services.php">Auto Insurance Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "trucking-insurance-lead-generation-services") echo 'active'; ?>" href="/insurance-bpo/trucking-insurance-lead-generation-services.php">Trucking Insurance Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "pet-insurance-lead-generation-services") echo 'active'; ?>" href="/insurance-bpo/pet-insurance-lead-generation-services.php">Pet Insurance Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "health-insurance-lead-generation-services") echo 'active'; ?>" href="/insurance-bpo/health-insurance-lead-generation-services.php">Health Insurance Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "commercial-insurance-lead-generation-services") echo 'active'; ?>" href="/insurance-bpo/commercial-insurance-lead-generation-services.php">Commercial Insurance Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "car-insurance-lead-generation-services") echo 'active'; ?>" href="/insurance-bpo/car-insurance-lead-generation-services.php">Car Insurance Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "life-insurance-lead-generation-services") echo 'active'; ?>" href="/insurance-bpo/life-insurance-lead-generation-services.php">Life Insurance Lead Generation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "lead-generation-for-insurance-agents") echo 'active'; ?>" href="/insurance-bpo/lead-generation-for-insurance-agents.php">Lead Generation for Insurance Agents</a></li>
					<li><a class="dropdown-item <?php if($page == "home-insurance-lead-generation-services") echo 'active'; ?>" href="/insurance-bpo/home-insurance-lead-generation-services.php">Home Insurance Lead Generation</a></li>
				</ul>
				</div>
 			</li>
						
			<li class="nav-item dropdown position-static">
				<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Customer_Support_Services') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Customer Support</a>
					<div class="dropdown-menu"> 
					<ul class="full-width-col">
						<li><a class="dropdown-item"  href="/call-center/customer-support-services.php">Customer Support Services </a></li>
						<li><a class="dropdown-item <?php if($page == "technical-support-outsourcing-services") echo 'active'; ?>" href="/call-center/technical-support-services.php">Call Center Technical Support</a></li>
						<li><a class="dropdown-item <?php if($page == "remote-it-support-services") echo 'active'; ?>" href="/call-center/remote-technical-support-services.php">Remote IT Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "retail-bpo-support-services") echo 'active'; ?>" href="/call-center/retail-bpo-support-services.php">Retail BPO Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "complaint-management-services") echo 'active'; ?>" href="/call-center/complaint-management-services.php">Complaint Management Services</a></li>
						<li><a class="dropdown-item <?php if($page == "multi-channel-contact-center-services") echo 'active'; ?>" href="/call-center/multi-channel-contact-center.php">Multi-channel Contact Center</a></li>
						<li><a class="dropdown-item <?php if($page == "toll-free-customer-support-services") echo 'active'; ?>" href="/call-center/toll-free-customer-support.php">Toll Free Customer Support</a></li>
						<li><a class="dropdown-item <?php if($page == "email-support-services") echo 'active'; ?>" href="/call-center/email-support-services.php">Email Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "live-chat-support-services") echo 'active'; ?>" href="/call-center/chat-support-services.php">Live Chat Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "social-media-customer-services") echo 'active'; ?>" href="/call-center/social-media-customer-services.php">Social Media Customer Services</a></li>
						<li><a class="dropdown-item <?php if($page == "video-chat-support-services") echo 'active'; ?>" href="/call-center/video-chat-services.php">Video Chat Services</a></li>
						<li><a class="dropdown-item <?php if($page == "retail-customer-support-services") echo 'active'; ?>" href="/call-center/retail-customer-support-services.php">Retail Customer Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "railway-logistics-bpo-services") echo 'active'; ?>" href="/call-center/railway-logistics-bpo-services.php">Railway Logistics BPO Services</a></li>
						<li><a class="dropdown-item <?php if($page == "multilingual-call-center-services") echo 'active'; ?>" href="/call-center/multilingual-call-center-services.php">Multilingual Call Center Services</a></li>
						<li><a class="dropdown-item <?php if($page == "ecommerce-customer-support-services") echo 'active'; ?>" href="/call-center/ecommerce-customer-support-services.php">eCommerce Customer Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "order-tracking-and-status-enquiry-customer-support-services") echo 'active'; ?>" href="/call-center/order-tracking-and-status-enquiry-customer-support-services.php">Order Tracking and Status Enquiry Customer Support</a></li>
						<li><a class="dropdown-item <?php if($page == "customer-interaction-services") echo 'active'; ?>" href="/call-center/customer-interaction-services.php">Customer Interaction Services</a></li>
						<li><a class="dropdown-item <?php if($page == "loyalty-program-management-services") echo 'active'; ?>" href="/call-center/loyalty-program-management-services.php">Loyalty Program Management</a></li>
						<li><a class="dropdown-item <?php if($page == "business-process-reengineering-services") echo 'active'; ?>" href="/call-center/business-process-reengineering-services.php">Business Process Reengineering Services</a></li>
						<li><a class="dropdown-item <?php if($page == "business-continuity-planning-services") echo 'active'; ?>" href="/call-center/business-continuity-planning-services.php">Business Continuity Planning Services</a></li>
						<li><a class="dropdown-item <?php if($page == "reactivating-dormant-client-services") echo 'active'; ?>" href="/call-center/reactivating-dormant-client-services.php">Reactivating Dormant Client</a></li>
						<li><a class="dropdown-item <?php if($page == "third-party-verification-services") echo 'active'; ?>" href="/call-center/third-party-verification-services.php">Third-party Verification Services</a></li>
						<li><a class="dropdown-item <?php if($page == "consumer-product-support-services") echo 'active'; ?>" href="/call-center/consumer-product-support-services.php">Consumer Product Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "seminar-registration-services") echo 'active'; ?>" href="/call-center/seminar-registration-services.php">Seminar Registration Services</a></li>
						<li><a class="dropdown-item <?php if($page == "pre-sales-support-services") echo 'active'; ?>" href="/call-center/pre-sales-support-services.php">Pre-sales Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "administrative-support-services") echo 'active'; ?>" href="/call-center/administrative-support-services.php">Administrative Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "customer-service-representative-services") echo 'active'; ?>" href="/call-center/customer-service-representative-services.php">Customer Service Representative Services</a></li>
						<li><a class="dropdown-item <?php if($page == "digital-customer-support-services") echo 'active'; ?>" href="/call-center/digital-customer-support-services.php">Digital Customer Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "customer-experience-cx-transformation-services") echo 'active'; ?>" href="/call-center/customer-experience-cx-transformation-services.php">Customer Experience (CX) Transformation Services</a></li>
						<li><a class="dropdown-item <?php if($page == "click-to-talk-support-services") echo 'active'; ?>" href="/call-center/click-to-talk-support-services.php">Click to Talk Support Services</a></li>
						<li><a class="dropdown-item <?php if($page == "digital-agent-services") echo 'active'; ?>" href="/call-center/digital-agent-services.php">Digital Agent Services</a></li>
						<li><a class="dropdown-item <?php if($page == "super-agent-services") echo 'active'; ?>" href="/call-center/super-agent-services.php">Super Agent Services</a></li>
					</ul>
					</div>
			</li>
			<li class="nav-item dropdown position-static">
			<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Virtual_Assistant' || $sub_group_name == 'Key_Diff_Virtual_Assistant') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Virtual Assistant</a>
					<div class="dropdown-menu h-auto"> 
					<ul class="full-width-col">
						<li><a class="dropdown-item"  href="/virtual-executive-assistant/">Virtual Assistant Services </a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-assistant-phone-answering-services") echo 'active'; ?>" href="/virtual-executive-assistant/call-answering.php">Call Answering</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-appointment-scheduling-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/appointment-scheduling.php">Appointment Scheduling</a></li>
						<li><a class="dropdown-item <?php if($page == "data-entry-virtual-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/data-entry-tasks.php">Data Entry</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-internet-research-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/internet-research-services.php">Internet Research</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-event-planning-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/event-planning-services.php">Event Planning</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-business-card-scanning-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/business-card-scanning.php">Business Card Scanning</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-desktop-publishing-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/desktop-publishing.php">DTP</a></li>
						<li><a class="dropdown-item <?php if($page == "travel-planning-virtual-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/travel-airline-hotel-reservation.php">Travel Planning</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-correspondence-management-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/correspondence-management.php">Correspondence Management</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-assistants-to-create-spreadsheets-and-presentations") echo 'active'; ?>" href="/virtual-executive-assistant/presentation-spreadsheet-creation.php">Presentations / Spreadsheets Creation</a></li>
						<li><a class="dropdown-item <?php if($page == "transaction-coordinator-services") echo 'active'; ?>" href="/virtual-executive-assistant/hire-a-transaction-coordinator.php">Hire a Transaction Coordinator</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-assistants-for-supply-management-services") echo 'active'; ?>" href="/virtual-executive-assistant/virtual-assistants-for-supply-management.php">Virtual Assistants for Supply Management</a></li>
						<li><a class="dropdown-item <?php if($page == "real-estate-virtual-assistant-services") echo 'active'; ?>" href="/virtual-executive-assistant/real-estate-virtual-assistant-services.php">Real Estate Virtual Assistant Services</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-assistants-for-accounting-and-bookkeeping-services") echo 'active'; ?>" href="/virtual-executive-assistant/virtual-assistants-for-accounting-and-bookkeeping.php">Virtual Assistants for Accounting and Bookkeeping</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-receptionist-services") echo 'active'; ?>" href="/call-center/virtual-receptionist-services.php">Virtual Receptionist Services</a></li>
						<li><a class="dropdown-item <?php if($page == "virtual-medical-assistant-services") echo 'active'; ?>" href="/call-center/virtual-assistant/virtual-medical-assistant-services.php">Virtual Medical Assistant Services</a></li>	
					</ul>
					</div>
 			</li>
			<li class="nav-item dropdown position-static">
				<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Monitoring_Support') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Call Center Monitoring</a>
					<div class="dropdown-menu h-auto"> 
					<ul class="full-width-col">
						<li><a class="dropdown-item"  href="/call-center/monitoring-support-services.php">Call Center Monitoring Support</a></li>
						<li><a class="dropdown-item <?php if($page == "remote-video-monitoring-services") echo 'active'; ?>" href="/call-center/remote-video-monitoring-services.php">Remote Video Monitoring Services</a></li>
						<li><a class="dropdown-item <?php if($page == "text-monitoring-services") echo 'active'; ?>" href="/call-center/text-monitoring-services.php">Text Monitoring</a></li>
						<li><a class="dropdown-item <?php if($page == "video-monitoring-services") echo 'active'; ?>" href="/call-center/video-monitoring-services.php">Video Monitoring</a></li>
						<li><a class="dropdown-item <?php if($page == "audio-monitoring-services") echo 'active'; ?>" href="/call-center/audio-monitoring-services.php">Audio Monitoring</a></li>
						<li><a class="dropdown-item <?php if($page == "cctv-monitoring") echo 'active'; ?>" href="/call-center/cctv-monitoring.php">CCTV Monitoring Services</a></li>
						<li><a class="dropdown-item <?php if($page == "call-center-quality-monitoring") echo 'active'; ?>" href="/call-center/call-quality-monitoring-support.php">Call Quality Monitoring</a></li>
						<li><a class="dropdown-item <?php if($page == "call-auditing-services") echo 'active'; ?>" href="/call-center/call-auditing-services.php">Call Auditing Services</a></li>
						<li><a class="dropdown-item <?php if($page == "call-quality-analytics-services") echo 'active'; ?>" href="/call-center/call-quality-analytics-services.php">Call Quality Analytics</a></li>
						<li><a class="dropdown-item <?php if($page == "ai-monitoring-support") echo 'active'; ?>" href="/call-center/ai-monitoring-support.php">AI Monitoring Support</a></li>
						<li><a class="dropdown-item <?php if($page == "voice-broadcasting-services") echo 'active'; ?>" href="/call-center/voice-broadcasting-services.php">Voice Broadcasting Services</a></li>
						<li><a class="dropdown-item <?php if($page == "content-monitoring-support-services") echo 'active'; ?>" href="/call-center/content-monitoring-support-services.php">Content Monitoring Support</a></li>
						<li><a class="dropdown-item <?php if($page == "content-moderation-services") echo 'active'; ?>" href="/call-center/call-center-monitoring/content-moderation-services.php">Content Moderation Services</a></li>
					</ul>
					</div>
			</li>
			<li class="nav-item dropdown position-static">
				<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Answering_Services') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Answering Services</a>
				<div class="dropdown-menu h-auto"> 
				<ul class="full-width-col">
					<li><a class="dropdown-item <?php if($path == "/call-center/answering-services/default.php") echo 'active'; ?>" href="/call-center/answering-services/">Answering Services</a></li>
					<li><a class="dropdown-item <?php if($page == "phone-answering-services") echo 'active'; ?>" href="/call-center/phone-answering-services.php">Phone Answering Services</a></li>
					<li><a class="dropdown-item <?php if($page == "medical-answering-services") echo 'active'; ?>" href="/call-center/medical-answering-services.php">Medical Answering Services</a></li>
					<li><a class="dropdown-item <?php if($page == "real-estate-call-answering-services") echo 'active'; ?>" href="/call-center/real-estate-call-answering-services.php">Real Estate Call Answering Services</a></li>
					<li><a class="dropdown-item <?php if($page == "after-hours-call-center-services") echo 'active'; ?>" href="/call-center/after-hours-call-center-services.php">After-hours Call Center Services</a></li>
				</ul>
				</div>
	  		 </li>
			   <li class="nav-item dropdown position-static">
				<a class="nav-link dropdown-toggle <?php if($sub_group_name =='Call_Center_Consulting') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Consulting</a>
				<div class="dropdown-menu h-auto"> 
				<ul class="full-width-col">
					<li><a class="dropdown-item" href="/call-center/call-center-consulting-services.php">Call Center Consulting</a></li>
					<li><a class="dropdown-item <?php if($page == "business-process-as-a-service") echo 'active'; ?>" href="/call-center/business-process-as-a-service.php">BPaaS</a></li>
					<li><a class="dropdown-item <?php if($page == "cloud-contact-center-services") echo 'active'; ?>" href="/call-center/cloud-contact-center-services.php">Cloud Contact Center</a></li>
					<li><a class="dropdown-item <?php if($page == "contact-center-transformation-services") echo 'active'; ?>" href="/call-center/contact-center-transformation-services.php">Contact Center Transformation Services</a></li>
					<li><a class="dropdown-item <?php if($page == "contact-center-modernization-services") echo 'active'; ?>" href="/call-center/contact-center-modernization-services.php">Contact Center Modernization Services</a></li>
					<li><a class="dropdown-item <?php if($page == "contact-center-services") echo 'active'; ?>" href="/call-center/contact-center-services.php">Contact Center Services</a></li>
				</ul>
				</div>
			 </li>
			 <li class="nav-item dropdown position-static">
			<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Articles_Main_Call_Center' || $sub_group_name == "Articles_Telemarketing_Services" || $sub_group_name == "Articles_Customer_Support_Services" || $sub_group_name == "Articles_Monitoring_Support" || $sub_group_name == "Articles_Call_Center_Consulting") echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Articles</a>
			<div class="dropdown-menu"> 
			<ul class="full-width-col">
				<li><a class="dropdown-item"  href="/call-center/articles/">Call Center Articles</a></li>
				<?php if($sub_group_name == "Telemarketing_Services" || $sub_group_name == "Articles_Telemarketing_Services" || $sub_group_name == "Articles_Main_Call_Center" || $sub_group_name == "Key_Diff_Call_Center" || $sub_group_name == "Case_Studies_Call_Center"){?>
	<li class="sub-heading">Telemarketing Articles</li>
	<li><a class="dropdown-item <?php if($page == "merchant-accounts-services") echo 'active'; ?>" href="/call-center/merchant-accounts-services.php">Web Merchant Accounts Services</a></li>
    <li><a class="dropdown-item <?php if($page == "12-tips-to-perfect-your-telemarketing-scripts") echo 'active'; ?>" href="/call-center/articles/12-tips-to-perfect-your-telemarketing-scripts.php">12 Tips to Perfect Your Telemarketing Scripts</a></li>
	<?php } ?>

	<?php if($sub_group_name == "Customer_Support_Services" || $sub_group_name == "Articles_Customer_Support_Services" || $sub_group_name == "Articles_Main_Call_Center" || $sub_group_name == "Key_Diff_Call_Center" || $sub_group_name == "Case_Studies_Call_Center"){?>
		<li class="sub-heading">Customer Support Articles</li>

<li><a class="dropdown-item <?php if($page == "digital-evolution-of-call-centers") echo 'active'; ?>" href="/call-center/articles/digital-evolution-of-call-centers.php">The Digital Evolution of Call Centers - From Basic Call Support to Customer Experience Center</a></li>
<li><a class="dropdown-item <?php if($page == "how-can-omnichannel-solutions-improve-call-center-contact-rates") echo 'active'; ?>" href="/call-center/articles/how-can-omnichannel-solutions-improve-call-center-contact-rates.php">How Can Omnichannel Solutions Improve Call Center Contact Rates</a></li>
<li><a class="dropdown-item <?php if($page == "5-call-center-technology-trends-to-transform-future-of-customer-service") echo 'active'; ?>" href="/call-center/articles/5-call-center-technology-trends-to-transform-future-of-customer-service.php">Top 5 Call Center Technology Trends Expected to Transform the Future of Customer Service</a></li>
<li><a class="dropdown-item <?php if($page == "tips-to-create-a-strong-unique-selling-proposition") echo 'active'; ?>" href="/call-center/articles/tips-to-create-a-strong-unique-selling-proposition.php">Tips to Create a Strong Unique Selling Proposition – Your Chance to Stand Out from the Rest</a></li>
<li><a class="dropdown-item <?php if($page == "visualizing-future-call-center-business-edge-customer-service-trends-more") echo 'active'; ?>" href="/call-center/articles/visualizing-future-call-center-business-edge-customer-service-trends-more.php">Visualizing the Future Call Center - Business Edge, Customer Service Trends, and More</a></li>
<li><a class="dropdown-item <?php if($page == "enhance-customer-experience-with-top-6-digital-transformation-trends") echo 'active'; ?>" href="/call-center/articles/enhance-customer-experience-with-top-6-digital-transformation-trends.php">Enhance your Customer Experience with These Top 6 Digital Transformation Trends</a></li>
<li><a class="dropdown-item <?php if($page == "top-ways-in-which-e-commerce-businesses-can-benefit-from-chat-support") echo 'active'; ?>" href="/call-center/articles/top-ways-in-which-e-commerce-businesses-can-benefit-from-chat-support.php">Top 10 Ways in Which eCommerce Businesses Can Benefit from Chat Support</a></li>
<li><a class="dropdown-item <?php if($page == "how-can-ai-help-you-improve-your-customer-support-experience") echo 'active'; ?>" href="/call-center/articles/how-can-ai-help-you-improve-your-customer-support-experience.php">How Can AI Help You Improve Your Customer Support Experience</a></li>
<li><a class="dropdown-item <?php if($page == "top-15-reasons-to-leverage-live-video-chat-for-your-business") echo 'active'; ?>" href="/call-center/articles/top-15-reasons-to-leverage-live-video-chat-for-your-business.php">Top 15 Reasons to Leverage Live Video Chat for Your Business</a></li>
<li><a class="dropdown-item <?php if($page == "technical-support") echo 'active'; ?>" href="/call-center/technical-support.php">Outsourcing Technical Support</a></li>
<li><a class="dropdown-item <?php if($page == "online-tutoring-services") echo 'active'; ?>" href="/call-center/online-tutoring-services.php">Online Tutoring Services</a></li>
<li><a class="dropdown-item <?php if($page == "benefits-of-ivr-systems-that-businesses-should-leverage") echo 'active'; ?>" href="/call-center/articles/benefits-of-ivr-systems-that-businesses-should-leverage.php">Top 6 Benefits of IVR Systems That Businesses Should Leverage</a></li>
	<?php } ?>	
	<?php if($sub_group_name == "Monitoring_Support" || $sub_group_name == "Articles_Monitoring_Support" || $sub_group_name == "Articles_Main_Call_Center" || $sub_group_name == "Key_Diff_Call_Center" || $sub_group_name == "Case_Studies_Call_Center"){?>
		<li class="sub-heading">Call Center Monitoring Support Articles</li>
		<li><a class="dropdown-item <?php if($page == "why-your-business-needs-video-surveillance") echo 'active'; ?>" href="/call-center/articles/why-your-business-needs-video-surveillance.php">10 Reasons Your Business Needs CCTV Monitoring or Video Surveillance</a></li>

	<?php } ?>

	<?php if($sub_group_name == "Call_Center_Consulting" || $sub_group_name == "Articles_Call_Center_Consulting" || $sub_group_name == "Articles_Main_Call_Center" || $sub_group_name == "Key_Diff_Call_Center" || $sub_group_name == "Case_Studies_Call_Center"){?>
		<li class="sub-heading">Call Center Consulting Articles</li>
	<li><a class="dropdown-item <?php if($page == "reasons-to-switch-contact-center-agent-software-to-webrtc") echo 'active'; ?>" href="/call-center/articles/reasons-to-switch-contact-center-agent-software-to-webrtc.php">Why Should You Immediately Switch your Contact Center Agent Software to WebRTC?</a></li>
	<li><a class="dropdown-item <?php if($page == "bpaas-contact-center-delivery") echo 'active'; ?>" href="/call-center/articles/bpaas-contact-center-delivery.php">Is It Right to Call BPaaS the Next Wave of Contact Center Delivery?</a></li>
	<li><a class="dropdown-item <?php if($page == "reasons-to-migrate-call-center-to-cloud") echo 'active'; ?>" href="/call-center/articles/reasons-to-migrate-call-center-to-cloud.php">Top 6 Reasons to Migrate Your Call Center to the Cloud</a></li>
	<li><a class="dropdown-item <?php if($page == "aws-cloud-migration-transforming-call-centers") echo 'active'; ?>" href="/call-center/articles/aws-cloud-migration-transforming-call-centers.php">How AWS and Cloud Migration are Transforming Call Centers</a></li>
	
	<?php } ?>

	<li class="sub-heading">General Articles</li>

<li><a class="dropdown-item <?php if($page == "the-role-of-cultural-alignment-in-customer-support-outsourcing") echo 'active'; ?>" href="/call-center/articles/the-role-of-cultural-alignment-in-customer-support-outsourcing.php">The Indubitable Role of Cultural Alignment in Customer Support Outsourcing</a></li>
<li><a class="dropdown-item <?php if($page == "managing-call-center-stress-customer-service-agent") echo 'active'; ?>" href="/call-center/articles/managing-call-center-stress-customer-service-agent.php">Managing Call Center Stress for a Customer Service Agent</a></li>
<li><a class="dropdown-item <?php if($page == "how-use-call-center-build-customer-loyalty") echo 'active'; ?>" href="/call-center/articles/how-use-call-center-build-customer-loyalty.php">How to Use Your Call Center to Build Customer Loyalty</a></li>
<li><a class="dropdown-item <?php if($page == "cloud-contact-centers-future-customer-expectations") echo 'active'; ?>" href="/call-center/articles/cloud-contact-centers-future-customer-expectations.php">Cloud Contact Centers and The Future of Customer Expectations</a></li>
<li><a class="dropdown-item <?php if($page == "call-center-best-practices-abide-post-pandemic-era") echo 'active'; ?>" href="/call-center/articles/call-center-best-practices-abide-post-pandemic-era.php">Call Center Best Practices to Abide by In the Post-Pandemic Era</a></li>
<li><a class="dropdown-item <?php if($page == "benefits-robotic-process-automation-call-centers") echo 'active'; ?>" href="/call-center/articles/benefits-robotic-process-automation-call-centers.php">The Benefits of Robotic Process Automation in Call Centers</a></li>
<li><a class="dropdown-item <?php if($page == "why-workforce-optimization-matters-hybrid-call-centers") echo 'active'; ?>" href="/call-center/articles/why-workforce-optimization-matters-hybrid-call-centers.php">Why Workforce Optimization Matters in Hybrid Contact Centers?</a></li>
<li><a class="dropdown-item <?php if($page == "how-can-outsourcing-call-center-services-save-money-and-increase-your-profitability") echo 'active'; ?>" href="/call-center/articles/how-can-outsourcing-call-center-services-save-money-and-increase-your-profitability.php">How Can Outsourcing Call Center Services Save Costs and Increase Your Profitability</a></li>
<li><a class="dropdown-item <?php if($page == "key-advantages-live-chat-customer-service-teams") echo 'active'; ?>" href="/call-center/articles/key-advantages-live-chat-customer-service-teams.php">Key Advantages of Live Chat for Customer Service Teams</a></li>
<li><a class="dropdown-item <?php if($page == "smart-contact-centers-future-customer-interaction") echo 'active'; ?>" href="/call-center/articles/smart-contact-centers-future-customer-interaction.php">Smart Contact Centers – The Future of Customer Interaction</a></li>
<li><a class="dropdown-item <?php if($page == "key-trends-lead-generation-sales-2022") echo 'active'; ?>" href="/call-center/articles/key-trends-lead-generation-sales-2022.php">Key Trends for Lead Generation and Sales for 2022</a></li>
<li><a class="dropdown-item <?php if($page == "how-does-ml-ai-rpa-automation-affect-call-center-service") echo 'active'; ?>" href="/call-center/articles/how-does-ml-ai-rpa-automation-affect-call-center-service.php">How Does ML, AI, RPA, and Automation Affect Call Center Service?</a></li>
<li><a class="dropdown-item <?php if($page == "call-center-security-trends-predictions") echo 'active'; ?>" href="/call-center/articles/call-center-security-trends-predictions.php">Top 10 Call Center Security Trends and Predictions for 2021</a></li>
<li><a class="dropdown-item <?php if($page == "top-10-qualities-a-call-center-agent-should-possess") echo 'active'; ?>" href="/call-center/articles/top-10-qualities-a-call-center-agent-should-possess.php">What Are the Top 10 Qualities a Call Center Agent Should Possess?</a></li>
<li><a class="dropdown-item <?php if($page == "how-work-from-home-is-transforming-sales-reps-to-virtual-sellers") echo 'active'; ?>" href="/call-center/articles/how-work-from-home-is-transforming-sales-reps-to-virtual-sellers.php">Work from Home Is the New Normal and Has Transformed Sales Rep to 'Virtual Sellers'</a></li>
<li><a class="dropdown-item <?php if($page == "steps-to-improve-efficiency-of-call-center-outsourcing-process") echo 'active'; ?>" href="/call-center/articles/steps-to-improve-efficiency-of-call-center-outsourcing-process.php">5 Steps to Improve the Efficiency of Your Call Center Outsourcing Process</a></li>
<li><a class="dropdown-item <?php if($page == "key-reasons-for-apac-dominance-in-helpdesk-support-market") echo 'active'; ?>" href="/call-center/articles/key-reasons-for-apac-dominance-in-helpdesk-support-market.php">6 Key Reasons for APAC Dominance in the Helpdesk Support Market</a></li>
<li><a class="dropdown-item <?php if($page == "6-ways-in-which-culture-and-brand-affect-client-experience") echo 'active'; ?>" href="/call-center/articles/6-ways-in-which-culture-and-brand-affect-client-experience.php">6 Ways in Which Culture and Brand Affect Client Experience</a></li>
<li><a class="dropdown-item <?php if($page == "how-to-gain-trust-of-customers-by-showing-that-you-care") echo 'active'; ?>" href="/call-center/articles/how-to-gain-trust-of-customers-by-showing-that-you-care.php">How to Gain the Trust of Customers by Showing That You Care?</a></li>
<li><a class="dropdown-item <?php if($page == "top-customer-experience-trends") echo 'active'; ?>" href="/call-center/articles/top-customer-experience-trends.php">Top Customer Experience Trends to Watch Out for in 2020 and Beyond</a></li>
<li><a class="dropdown-item <?php if($page == "customer-service-skills-business-needs-to-acquire") echo 'active'; ?>" href="/call-center/articles/customer-service-skills-business-needs-to-acquire.php">7 Top Customer Service Skills Your Business Needs to Acquire</a></li>								  	
<li><a class="dropdown-item <?php if($page == "6-call-center-trends-that-will-make-impact") echo 'active'; ?>" href="/call-center/articles/6-call-center-trends-that-will-make-impact.php">6 Call Center Trends that Will Make an Impact in 2020</a></li>
<li><a class="dropdown-item <?php if($page == "10-key-points-to-evaluate-call-center-outsourcing-vendor") echo 'active'; ?>" href="/call-center/articles/10-key-points-to-evaluate-call-center-outsourcing-vendor.php">10 Key Points to Evaluate a Call Center Outsourcing Vendor</a></li>	
<li><a class="dropdown-item <?php if($page == "is-philippines-call-center-capital-of-the-world") echo 'active'; ?>" href="/call-center/articles/is-philippines-call-center-capital-of-the-world.php">Is Philippines the Call Center Capital of the World?</a></li>								  
<li><a class="dropdown-item <?php if($page == "call-center-glossary-of-terminologies-abbreviations") echo 'active'; ?>" href="/call-center/articles/call-center-glossary-of-terminologies-abbreviations.php">Call Center Glossary of Terminologies and Abbreviations</a></li>
<li><a class="dropdown-item <?php if($page == "top-8-benefits-of-multi-channel-contact-centers") echo 'active'; ?>" href="/call-center/articles/top-8-benefits-of-multi-channel-contact-centers.php">Top 8 Benefits of Multi-channel Contact Centers</a></li>
<li><a class="dropdown-item <?php if($page == "top-call-center-outsourcing-trends-2017") echo 'active'; ?>" href="/call-center/articles/top-call-center-outsourcing-trends-2017.php">Top 10 Trends That Will Drive Call Center Outsourcing in 2017</a></li>
<li><a class="dropdown-item <?php if($page == "virtual-call-center-benefits") echo 'active'; ?>" href="/call-center/articles/virtual-call-center-benefits.php">Benefits of Virtual Call Centers</a></li>
<li><a class="dropdown-item <?php if($page == "major-challenges-callcenter-industry") echo 'active'; ?>" href="/call-center/articles/major-challenges-callcenter-industry.php">12 Major Challenges Faced by the Call Center Industry</a></li>
<li><a class="dropdown-item <?php if($page == "advantages-of-bilingual-tutors") echo 'active'; ?>" href="/call-center/articles/advantages-of-bilingual-tutors.php">Advantages of Flatworld's Bilingual Tutors</a></li>
<li><a class="dropdown-item <?php if($page == "offshore-call-center-services") echo 'active'; ?>" href="/call-center/articles/offshore-call-center-services.php">Offshore Call Center Services</a></li>
<li><a class="dropdown-item <?php if($page == "call-center-outsourcing-partner") echo 'active'; ?>" href="/call-center/articles/call-center-outsourcing-partner.php">Choosing the right call center partner</a></li>
<li><a class="dropdown-item <?php if($page == "why-outsource-callcenter-services") echo 'active'; ?>" href="/call-center/articles/why-outsource-callcenter-services.php">Why Outsource Call Center Services?</a></li>
<li><a class="dropdown-item <?php if($page == "call-center-outsourcing-benefits") echo 'active'; ?>" href="/call-center/articles/call-center-outsourcing-benefits.php">Benefits of Call Center Outsourcing</a></li>
<li><a class="dropdown-item <?php if($page == "call-center") echo 'active'; ?>" href="/bpo-services/call-center.php">Call Center Outsourcing Service</a></li>
<li><a class="dropdown-item <?php if($page == "25-cold-calling-techniques-for-sales-success") echo 'active'; ?>" href="/call-center/articles/25-cold-calling-techniques-for-sales-success.php">25 Cold Calling Techniques for Sales Success in 2020</a></li>
<li><a class="dropdown-item <?php if($page == "are-phones-no-longer-relevant-for-call-centers") echo 'active'; ?>" href="/call-center/articles/are-phones-no-longer-relevant-for-call-centers.php">Are Phones No Longer Relevant for Call Centers?</a></li>
<li><a class="dropdown-item <?php if($page == "14-ways-to-provide-great-customer-experience-in-your-call-center") echo 'active'; ?>" href="/call-center/articles/14-ways-to-provide-great-customer-experience-in-your-call-center.php">14 Ways To Provide A Great Customer Experience In Your Call Center</a></li>
<li><a class="dropdown-item <?php if($page == "how-is-ai-impacting-contact-centers-and-contact-center-experience") echo 'active'; ?>" href="/call-center/articles/how-is-ai-impacting-contact-centers-and-contact-center-experience.php">How is AI Impacting Contact Centers &amp; the Contact Center Experience?</a></li>
<li><a class="dropdown-item <?php if($page == "best-practices-tips-for-contact-centres-post-covid") echo 'active'; ?>" href="/call-center/articles/best-practices-tips-for-contact-centres-post-covid.php">Top 17 Best Practices &amp; Actionable tips for Contact Centres Post-COVID</a></li>
<li><a class="dropdown-item <?php if($page == "benefits-of-ringless-voicemail-for-businesses") echo 'active'; ?>" href="/call-center/articles/benefits-of-ringless-voicemail-for-businesses.php">Top 10 Benefits of Ringless Voicemail For Businesses</a></li>

	
			</ul>
			</div>
 			</li>
			 <li class="nav-item dropdown position-static">
	<a class="nav-link dropdown-toggle <?php if($sub_group_name == 'Case_Studies_Call_Center') echo 'active';?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">Case Studies</a>
		<div class="dropdown-menu"> 
		<ul class="full-width-col">
			<li><a class="dropdown-item"  href="/call-center/callcenter-case-studies.php">Call Center Case Studies</a></li>
			<li><a class="dropdown-item <?php if($page == "improved-customer-experience-through-product-catalog-management") echo 'active';?>" href="/call-center/success-stories/improved-customer-experience-through-product-catalog-management.php">Enhancing Customer Experience - The Power of Efficient e-Commerce Product Catalog Management</a></li>
			<li><a class="dropdown-item <?php if($page == "delivered-call-center-services-to-the-motorcycle-insurance-provider") echo 'active';?>" href="/call-center/success-stories/delivered-call-center-services-to-the-motorcycle-insurance-provider.php">FWS Delivered Comprehensive Call Center Services to the Top Motorcycle Insurance Provider in the UK</a></li>
			<li><a class="dropdown-item <?php if($page == "delivered-cold-calling-appointment-setting-services-serial-entrepreneur") echo 'active';?>" href="/call-center/success-stories/delivered-cold-calling-appointment-setting-services-serial-entrepreneur.php">Flatworld Solutions Delivered Cold Calling and Appointment Setting Services to a Serial US-based Entrepreneur</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-cctv-surveillance-services-to-an-aluminum-recycling-company") echo 'active';?>" href="/call-center/success-stories/provided-cctv-surveillance-services-to-an-aluminum-recycling-company.php">Flatworld Delivered CCTV Surveillance Services to an Aluminum Recycling Company in the US</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-virtual-assistant-services-to-autism-therapy-provider") echo 'active';?>" href="/call-center/success-stories/provided-virtual-assistant-services-to-autism-therapy-provider.php">Flatworld Delivered Virtual Assistant Services to an Autism Therapy Provider</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-generation-services-to-a-us-based-client") echo 'active';?>" href="/call-center/success-stories/lead-generation-services-to-a-us-based-client.php">Flatworld Solutions Provided Outstanding Lead Generation Services to a US-based Client</a></li>
			<li><a class="dropdown-item <?php if($page == "delivered-lead-generation-services-insurance-sector") echo 'active';?>" href="/call-center/success-stories/delivered-lead-generation-services-insurance-sector.php">Flatworld Solutions Provided Lead Generation Services to a Company in the Medical Insurance Sector</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-generation-services-to-an-insurance-agency-in-the-us") echo 'active';?>" href="/call-center/success-stories/lead-generation-services-to-an-insurance-agency-in-the-us.php">Flatworld Solutions Streamlined Lead Generation For an US-based Insurance Agency</a></li>

			<li><a class="dropdown-item <?php if($page == "customer-support-services-for-health-supplement-provider") echo 'active';?>" href="/call-center/success-stories/customer-support-services-for-health-supplement-provider.php">Flatworld Solutions Assisted a Well-Established Health Supplement Providing Company With Enhanced Customer Support Solutions</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-nurturing-outbound-call-strategy") echo 'active';?>" href="/call-center/success-stories/lead-nurturing-outbound-call-strategy.php">Flatworld Solutions Used Lead Nurturing Outbound Call Strategy to Increase Engagement and Drive Sales</a></li>
			<li><a class="dropdown-item <?php if($page == "data-entry-and-payment-collection-to-an-insurance-company") echo 'active';?>" href="/call-center/success-stories/data-entry-and-payment-collection-to-an-insurance-company.php">FWS Assisted a Reputed Insurance Company in Optimizing their Data Entry and Inbound Payment Collection Processes.</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-generation-and-appointment-setting-for-franchise") echo 'active';?>" href="/call-center/success-stories/lead-generation-and-appointment-setting-for-franchise.php">FWS Assisted a Franchise Business Consultancy with Our Effective Lead Generation and Appointment Setting Services</a></li>
			<li><a class="dropdown-item <?php if($page == "delivered-appointment-setting-services-insurance-company") echo 'active';?>" href="/call-center/success-stories/delivered-appointment-setting-services-insurance-company.php">Flatworld Solutions Delivered Appointment Setting Services to a Leading Insurance Company</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-services-to-brazilian-cosmetics-company") echo 'active';?>" href="/call-center/success-stories/cold-calling-services-to-brazilian-cosmetics-company.php">Flatworld Solutions Delivered Cold Calling Services to a Brazilian Cosmetics Firm</a></li>									
			<li><a class="dropdown-item <?php if($page == "provided-appointment-setting-services-financial-services-firm") echo 'active';?>" href="/call-center/success-stories/provided-appointment-setting-services-financial-services-firm.php">Flatworld Solutions Delivered Appointment Setting Services to a Financial Services Firm</a></li>									
			<li><a class="dropdown-item <?php if($page == "appointment-setting-services-for-a-licensed-mortgage-lender") echo 'active';?>" href="/call-center/success-stories/appointment-setting-services-for-a-licensed-mortgage-lender.php">Flatworld Solutions Provided Appointment Setting Services for a US-based Mortgage Lender</a></li>									
			<li><a class="dropdown-item <?php if($page == "provided-appointment-setting-services-to-mortgage-lender") echo 'active';?>" href="/call-center/success-stories/provided-appointment-setting-services-to-mortgage-lender.php">Flatworld Solutions Provided Appointment Setting Services to a Mortgage Lender</a></li>
			<li><a class="dropdown-item <?php if($page == "cctv-surveillance-for-car-wash-franchise-in-usa") echo 'active';?>" href="/call-center/success-stories/cctv-surveillance-for-car-wash-franchise-in-usa.php">Flatworld Provided CCTV Surveillance for a Reputed Car Wash Franchise in the USA</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-verification-services-to-a-medical-supplies-company") echo 'active';?>" href="/call-center/success-stories/lead-verification-services-to-a-medical-supplies-company.php">Flatworld Solutions Offered Lead Verification Services to a Medical Supplies Company</a></li>
			<li><a class="dropdown-item <?php if($page == "customer-onboarding-support-to-a-mobility-solutions-provider") echo 'active';?>" href="/call-center/success-stories/customer-onboarding-support-to-a-mobility-solutions-provider.php">Flatworld Solutions Helped a Mobility Solutions Provider with Client Onboarding</a></li>									
			<li><a class="dropdown-item <?php if($page == "appointment-setting-services-to-australian-business") echo 'active';?>" href="/call-center/success-stories/appointment-setting-services-to-australian-business.php">Flatworld Solutions Provided Appointment Setting Services to an Australian Business</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-generation-for-real-estate-conglomerate") echo 'active';?>" href="/call-center/success-stories/lead-generation-for-real-estate-conglomerate.php">Flatworld Provided Lead Generation to a Real Estate Conglomerate</a></li>

			<li><a class="dropdown-item <?php if($page == "outbound-calling-for-massage-equipment-supplier") echo 'active';?>" href="/call-center/success-stories/outbound-calling-for-massage-equipment-supplier.php">Flatworld Provided Outbound Calling to a Massage Equipment Supplier</a></li>
			<li><a class="dropdown-item <?php if($page == "chat-support-provided-to-indian-medtech-company") echo 'active';?>" href="/call-center/success-stories/chat-support-provided-to-indian-medtech-company.php">Flatworld Provided Chat Support Services to an Indian Medtech Company</a></li>
			<li><a class="dropdown-item <?php if($page == "customer-support-to-us-based-client") echo 'active';?>" href="/call-center/success-stories/customer-support-to-us-based-client.php">Flatworld Provided Customer Support Services to a US-based Company</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-appointment-setting-services-to-uk-based-business") echo 'active';?>" href="/call-center/success-stories/provided-appointment-setting-services-to-uk-based-business.php">Flatworld Solutions Provided Appointment Setting Services to a UK-based Medical Diagnostics Center</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-cold-calling-services-to-us-based-business") echo 'active';?>" href="/call-center/success-stories/provided-cold-calling-services-to-us-based-business.php">Flatworld Solutions Provided Cold Calling Services to a US-based Technology Company</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-appointment-setting-services-to-charlotte-based-business") echo 'active';?>" href="/call-center/success-stories/provided-appointment-setting-services-to-charlotte-based-business.php">Flatworld Solutions Provided Appointment Setting Services to a Charlotte-based Business</a></li>
			<li><a class="dropdown-item <?php if($page == "customer-support-provided-us-based-company") echo 'active';?>" href="/call-center/success-stories/customer-support-provided-us-based-company.php">Flatworld Provided Customer Support to a US-based Luxury Goods Company</a></li>
			<li><a class="dropdown-item <?php if($page == "appointment-setting-to-canadian-seo-company") echo 'active';?>" href="/call-center/success-stories/appointment-setting-to-canadian-seo-company.php">Flatworld Provided Appointment Setting to a Canadian SEO Company</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-lead-generation-services-to-insurance-franchise") echo 'active';?>" href="/call-center/success-stories/provided-lead-generation-services-to-insurance-franchise.php">Flatworld Solutions Provided Lead Generation Services to an Insurance Franchise</a></li>
			<li><a class="dropdown-item <?php if($page == "telemarketing-to-digital-marketplace-company") echo 'active';?>" href="/call-center/success-stories/telemarketing-to-digital-marketplace-company.php">Flatworld Provided Telemarketing Services to a Digital Marketplace Company</a></li>
			<li><a class="dropdown-item <?php if($page == "inbound-call-center-services-endocrinology-center") echo 'active';?>" href="/call-center/success-stories/inbound-call-center-services-endocrinology-center.php">Flatworld Provided Inbound Call Center Services to an Endocrinology Center</a></li>
			<li><a class="dropdown-item <?php if($page == "inbound-customer-support-provided-to-gaming-startup") echo 'active';?>" href="/call-center/success-stories/inbound-customer-support-provided-to-gaming-startup.php">Flatworld Provided Inbound Customer Support to an Israel-based Gaming Startup</a></li>
			<li><a class="dropdown-item <?php if($page == "live-call-transferring-services-provided-to-client") echo 'active';?>" href="/call-center/success-stories/live-call-transferring-services-provided-to-client.php">Flatworld Performed Live Call Transfers to Close Sales for a Chicken Coop Manufacturer</a></li>
			<li><a class="dropdown-item <?php if($page == "inbound-customer-service-to-indian-medical-coaching-institute") echo 'active';?>" href="/call-center/success-stories/inbound-customer-service-to-indian-medical-coaching-institute.php">Flatworld Solutions Provided Inbound Customer Services to Indian Medical Coaching Institute</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-services-provided-to-insurance-company") echo 'active';?>" href="/call-center/success-stories/cold-calling-services-provided-to-insurance-company.php">Flatworld Provided Cold Calling Services to a Medical Insurance Company</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-support-to-uk-based-recruitment-company") echo 'active';?>" href="/call-center/success-stories/outbound-support-to-uk-based-recruitment-company.php">Flatworld Solutions Provided Outbound Support to UK-based Recruitment Company</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-support-to-us-based-financial-company") echo 'active';?>" href="/call-center/success-stories/outbound-support-to-us-based-financial-company.php">Flatworld Solutions Provided Outbound Support to US-based Financial Company</a></li>

			<li><a class="dropdown-item <?php if($page == "customer-support-to-global-software-company") echo 'active';?>" href="/call-center/success-stories/customer-support-to-global-software-company.php">Flatworld Provided Customer Support Services to a Global Software Company</a></li>
			<li><a class="dropdown-item <?php if($page == "customer-support-to-educate-and-file-taxation-during-session") echo 'active';?>" href="/call-center/success-stories/customer-support-to-educate-and-file-taxation-during-session.php">Flatworld's Provided Customer Support to Educate & File Taxation During the Session</a></li>
			<li><a class="dropdown-item <?php if($page == "appointment-setting-to-engage-qualified-prospects-for-german-real-estate-client") echo 'active';?>" href="/call-center/success-stories/appointment-setting-to-engage-qualified-prospects-for-german-real-estate-client.php">Appointment Setting for German Client by Flatworld to Engage Qualified Prospects</a></li>
			<li><a class="dropdown-item <?php if($page == "appointment-setting-services-for-leading-stationery-supplier") echo 'active';?>" href="/call-center/success-stories/appointment-setting-services-for-leading-stationery-supplier.php">Flatworld Provided Appointment Setting to a Leading Stationery Supplier</a></li>
			<li><a class="dropdown-item <?php if($page == "calling-services-for-financial-stock-market-solutions-firm") echo 'active';?>" href="/call-center/success-stories/calling-services-for-financial-stock-market-solutions-firm.php">Flatworld Provided Calling Services to a Financial &amp; Stock Market Solutions Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "calling-services-for-network-security-firm") echo 'active';?>" href="/call-center/success-stories/calling-services-for-network-security-firm.php">Flatworld Provided Calling Services to a Computer Network Security Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "telemarketing-to-hr-advisory-firm") echo 'active';?>" href="/call-center/success-stories/telemarketing-to-hr-advisory-firm.php">Flatworld Provided Telemarketing to a Leading HR Advisory Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-provided-to-daycare-research-company") echo 'active';?>" href="/call-center/success-stories/cold-calling-provided-to-daycare-research-company.php">Cold Calling Provided to Daycare Research Company by Flatworld to Field More ROI</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-generation-for-property-services-business") echo 'active';?>" href="/call-center/success-stories/lead-generation-for-property-services-business.php">Flatworld Provided Lead Generation to Property Business to Identify Property and Send Letters</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-generation-services-for-publishing-company") echo 'active';?>" href="/call-center/success-stories/lead-generation-services-for-publishing-company.php">Flatworld Provided Lead Generation Services to a Leading Publishing Company</a></li>
			<li><a class="dropdown-item <?php if($page == "email-customer-support-for-online-pet-shop") echo 'active';?>" href="/call-center/success-stories/email-customer-support-for-online-pet-shop.php">Flatworld Provided Email Customer Support to an Online Pet Shop</a></li>
			<li><a class="dropdown-item <?php if($page == "chat-support-services-uk-based-firm") echo 'active';?>" href="/call-center/success-stories/chat-support-services-uk-based-firm.php">Flatworld Provided Chat Support Services to a Leading UK-based Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-generation-services-for-financial-company") echo 'active';?>" href="/call-center/success-stories/lead-generation-services-for-financial-company.php">Flatworld Provided Lead Generation Services to a Leading Financial Company</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-calling-services-provided-to-doctors") echo 'active';?>" href="/call-center/success-stories/outbound-calling-services-provided-to-doctors.php">Flatworld Provided Outbound Calling Services to a Group of Doctors</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-services-to-indian-multi-vendor-platform") echo 'active';?>" href="/call-center/success-stories/cold-calling-services-to-indian-multi-vendor-platform.php">Flatworld Solutions Provided Cold Calling Services to an Indian Client</a></li>
			<li><a class="dropdown-item <?php if($page == "call-monitoring-support-to-laundry-air-vending-company") echo 'active';?>" href="/call-center/success-stories/call-monitoring-support-to-laundry-air-vending-company.php">Flatworld Provided Call Monitoring Support to a Giant Laundry and Air Vending Company</a></li>
			<li><a class="dropdown-item <?php if($page == "call-quality-monitoring-to-financial-services-firm") echo 'active';?>" href="/call-center/success-stories/call-quality-monitoring-to-financial-services-firm.php">Flatworld Provided Call Quality Monitoring to a Financial Services Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-aerospace-equipment-distributor-with-client-relationship-manager") echo 'active';?>" href="/call-center/success-stories/provided-aerospace-equipment-distributor-with-client-relationship-manager.php">Flatworld Solutions Provided an Aerospace Equipment Distributor with a Client Relationship Manager</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-appointment-setting-to-us-based-client") echo 'active';?>" href="/call-center/success-stories/provided-appointment-setting-to-us-based-client.php">Flatworld Solutions Provided Appointment Setting Services to a US-based Client</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-inbound-customer-support-for-payment-gateway-company") echo 'active';?>" href="/call-center/success-stories/provided-inbound-customer-support-for-payment-gateway-company.php">Flatworld Solutions Provided Inbound Customer Support for a Payment Gateway Company</a></li>
			<li><a class="dropdown-item <?php if($page == "telemarketing-services-to-green-tea-products-firm") echo 'active';?>" href="/call-center/success-stories/telemarketing-services-to-green-tea-products-firm.php">Flatworld Provided Telemarketing Services to a Green Tea Products Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "live-cctv-monitoring-of-a-hostel-for-uk-client") echo 'active';?>" href="/call-center/success-stories/live-cctv-monitoring-of-a-hostel-for-uk-client.php">Flatworld Solutions Provided Live CCTV Monitoring of a Hostel for A UK-based Property Owner</a></li>
			<li><a class="dropdown-item <?php if($page == "remote-desktop-support-provided-to-client") echo 'active';?>" href="/call-center/success-stories/remote-desktop-support-provided-to-client.php">Flatworld Solutions Provided Remote Desktop Support Services to a Data Intelligence Solution Provider</a></li>
			<li><a class="dropdown-item <?php if($page == "inbound-calling-to-us-based-order-management-company") echo 'active';?>" href="/call-center/success-stories/inbound-calling-to-us-based-order-management-company.php">Flatworld Solutions Provided Inbound Calling Service to US-based Order Management Company</a></li>
			<li><a class="dropdown-item <?php if($page == "inbound-call-center-services-provided-to-digital-marketing-agency") echo 'active';?>" href="/call-center/success-stories/inbound-call-center-services-provided-to-digital-marketing-agency.php">Flatworld Solutions Provided Inbound Call Center Services to a Digital Marketing Agency</a></li>
			<li><a class="dropdown-item <?php if($page == "telemarketing-services-for-home-decor-firm") echo 'active';?>" href="/call-center/success-stories/telemarketing-services-for-home-decor-firm.php">Flatworld Provided Telemarketing Services to a US-based Home Decor Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "customer-support-for-us-based-hotel") echo 'active';?>" href="/call-center/success-stories/customer-support-for-us-based-hotel.php">Flatworld Provided Customer Support Services to a US-based Hotel</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-call-center-services-provided-to-uae-based-client") echo 'active';?>" href="/call-center/success-stories/outbound-call-center-services-provided-to-uae-based-client.php">Flatworld Solutions Provided Outbound Call Center Services to a UAE-based Client</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-calling-for-an-online-coaching-firm") echo 'active';?>" href="/call-center/success-stories/outbound-calling-for-an-online-coaching-firm.php">Flatworld Provided Outbound Calling Services to an Online Coaching Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "cctv-monitoring-services-provided-to-european-gym") echo 'active';?>" href="/call-center/success-stories/cctv-monitoring-services-provided-to-european-gym.php">Flatworld Solutions Provided CCTV Monitoring Services to a European Gym</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-services-provided-to-client") echo 'active';?>" href="/call-center/success-stories/cold-calling-services-provided-to-client.php">Flatworld Solutions Provided Cold Calling Services to a Management Software Solutions Company</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-for-food-delivery-services-company") echo 'active';?>" href="/call-center/success-stories/cold-calling-for-food-delivery-services-company.php">Flatworld Provided Cold Calling to a Food Delivery Services Company</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-support-provided-to-bangalore-based-educational-institution") echo 'active';?>" href="/call-center/success-stories/cold-calling-support-provided-to-bangalore-based-educational-institution.php">Flatworld Solutions Provided Cold Calling Support to Bangalore-based Educational Institution</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-calling-to-boost-ppe-kits-sale-for-healthcare-manufacturer") echo 'active';?>" href="/call-center/success-stories/outbound-calling-to-boost-ppe-kits-sale-for-healthcare-manufacturer.php">Flatworld Provided Outbound Calling to Boost Sale of PPE Kits for a Healthcare Manufacturer</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-inbound-calling-services-to-major-bpo-company") echo 'active';?>" href="/call-center/success-stories/provided-inbound-calling-services-to-major-bpo-company.php">Flatworld Provided Inbound Calling Services to a Major BPO Company</a></li>
			<li><a class="dropdown-item <?php if($page == "email-support-provided-to-uk-based-company") echo 'active';?>" href="/call-center/success-stories/email-support-provided-to-uk-based-company.php">Flatworld Solutions Provided Email Support to a UK-based Client</a></li>
			<li><a class="dropdown-item <?php if($page == "provided-outbound-calling-services-to-hearing-aid-company") echo 'active';?>" href="/call-center/success-stories/provided-outbound-calling-services-to-hearing-aid-company.php">Flatworld Provided Outbound Calling Services to a Hearing Aid Company</a></li>
			<li><a class="dropdown-item <?php if($page == "answering-support-to-a-pharma-sector-client") echo 'active';?>" href="/call-center/success-stories/answering-support-to-a-pharma-sector-client.php">Flatworld Solutions Provided Answering Support to a Leading Pharma Sector Client</a></li>
			<li><a class="dropdown-item <?php if($page == "appointment-setting-to-washington-based-client") echo 'active';?>" href="/call-center/success-stories/appointment-setting-to-washington-based-client.php">Flatworld Provided Appointment Setting Services to a Washington-based Client</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-calling-for-e-logistics-startup") echo 'active';?>" href="/call-center/success-stories/outbound-calling-for-e-logistics-startup.php">Flatworld Solutions Provided Outbound Calling Services to a e-Logistics Startup</a></li>
			<li><a class="dropdown-item <?php if($page == "quality-audit-support-for-mortgage-marketing-firm") echo 'active';?>" href="/call-center/success-stories/quality-audit-support-for-mortgage-marketing-firm.php">Flatworld Provided Quality Audit Support to a Leading Mortgage Marketing Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-calling-for-event-management-firm") echo 'active';?>" href="/call-center/success-stories/outbound-calling-for-event-management-firm.php">Flatworld Provided Outbound Calling to an Event Management Firm to Confirm Attendee List</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-support-for-contract-research-organization") echo 'active';?>" href="/call-center/success-stories/cold-calling-support-for-contract-research-organization.php">Flatworld provided Cold Calling Support to a Contract Research Organization</a></li>
			<li><a class="dropdown-item <?php if($page == "resolved-customer-issues-with-empathy") echo 'active';?>" href="/call-center/success-stories/resolved-customer-issues-with-empathy.php">Flatworld's Agents Resolved Customer Issues With Empathy</a></li>
			<li><a class="dropdown-item <?php if($page == "cold-calling-services-for-cybersecurity-magazine-publisher") echo 'active';?>" href="/call-center/success-stories/cold-calling-services-for-cybersecurity-magazine-publisher.php">Flatworld Provided Cold Calling Services to a Cybersecurity Magazine Publisher</a></li>
			<li><a class="dropdown-item <?php if($page == "telemarketing-services-for-insurance-firm") echo 'active';?>" href="/call-center/success-stories/telemarketing-services-for-insurance-firm.php">Flatworld Provided Telemarketing Services to a Leading Insurance Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "call-center-services-provided-to-cement-manufacturing-giant") echo 'active';?>" href="/call-center/success-stories/call-center-services-provided-to-cement-manufacturing-giant.php">Flatworld Provided Call Center Services to Cement Manufacturing Giant</a></li>
			<li><a class="dropdown-item <?php if($page == "cati-services-for-market-entry-strategist") echo 'active';?>" href="/call-center/success-stories/cati-services-for-market-entry-strategist.php">Flatworld Provided CATI Support to a Leading Market Entry Strategist</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-calling-services-for-real-estate-firm") echo 'active';?>" href="/call-center/success-stories/outbound-calling-services-for-real-estate-firm.php">Flatworld Provided Outbound Calling Services to a Real Estate Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "email-support-services-it-accounting-firm") echo 'active';?>" href="/call-center/success-stories/email-support-services-it-accounting-firm.php">Flatworld Provided Email Support Services to an IT & Accounting Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "inbound-outbound-calling-services-to-software-provider") echo 'active';?>" href="/call-center/success-stories/inbound-outbound-calling-services-to-software-provider.php">Flatworld Provided Inbound and Outbound Calling Services to a Leading Software Provider</a></li>
			<li><a class="dropdown-item <?php if($page == "database-management-for-recruitment-firm") echo 'active';?>" href="/call-center/success-stories/database-management-for-recruitment-firm.php">Flatworld Provided Database Management to a UK-based Recruitment Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-calling-for-a-travel-firm") echo 'active';?>" href="/call-center/success-stories/outbound-calling-for-a-travel-firm.php">Flatworld Provided Outbound Calling Services to a Leading Travel Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "order-processing-for-cartoon-drawing-company") echo 'active';?>" href="/call-center/success-stories/order-processing-for-cartoon-drawing-company.php">Flatworld Provided Order Processing Services to a Leading Cartoon Drawing Company</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-calling-for-an-education-firm") echo 'active';?>" href="/call-center/success-stories/outbound-calling-for-an-education-firm.php">Flatworld Provided Outbound Calling Services to a Leading Educational Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "telemarketing-for-a-management-platform-provider") echo 'active';?>" href="/call-center/success-stories/telemarketing-for-a-management-platform-provider.php">Flatworld Provided Telemarketing to a Management Platform Provider</a></li>									
			<li><a class="dropdown-item <?php if($page == "outbound-calling-booking-service-to-a-uk-client") echo 'active';?>" href="/call-center/success-stories/outbound-calling-booking-service-to-a-uk-client.php">Flatworld Provided Outbound Calling and Booking Services to a UK Equipment Insurer</a></li>
			<li><a class="dropdown-item <?php if($page == "data-mining-service-to-a-vacation-rental-company") echo 'active';?>" href="/call-center/success-stories/data-mining-service-to-a-vacation-rental-company.php" >Flatworld Provided Data Mining Services to A Vacation Rental Company</a></li>
			<li><a class="dropdown-item <?php if($page == "lead-generation-for-an-seo-company") echo 'active';?>" href="/call-center/success-stories/lead-generation-for-an-seo-company.php">Flatworld Provided Lead Generation to a Leading SEO Company</a></li>
			<li><a class="dropdown-item <?php if($page == "call-quality-monitoring-support-for-ai-platform-provider") echo 'active';?>" href="/call-center/success-stories/call-quality-monitoring-support-for-ai-platform-provider.php">Flatworld Provided Call Quality Monitoring Services to an AI Platform Provider</a></li>
			<li><a class="dropdown-item <?php if($page == "inbound-call-center-support-healthcare-consultant") echo 'active';?>" href="/call-center/success-stories/inbound-call-center-support-healthcare-consultant.php">Flatworld Solutions Provided Inbound Call Center Support Services to a Berlin-based Healthcare Consultant</a></li>
			<li><a class="dropdown-item <?php if($page == "ticketing-email-support-to-home-improvement-products-company") echo 'active';?>" href="/call-center/success-stories/ticketing-email-support-to-home-improvement-products-company.php">Flatworld Solutions Provided Ticketing &amp; Email Support Services to a Leading Home Improvement Products Manufacturer</a></li>
			<li><a class="dropdown-item <?php if($page == "telecalling-lead-generation-for-financial-firm") echo 'active';?>" href="/call-center/success-stories/telecalling-lead-generation-for-financial-firm.php">Flatworld Solutions Provided Telecalling Lead Generation Services to a Leading Financial Firm</a></li>
			<li><a class="dropdown-item <?php if($page == "it-support-to-motorcycle-insurance-company") echo 'active';?>" href="/call-center/success-stories/it-support-to-motorcycle-insurance-company.php">Flatworld Solutions Provided IT Support to a Motorcycle Insurance Company in the UK</a></li>
			<li><a class="dropdown-item <?php if($page == "live-video-audio-text-monitoring-to-internet-firm") echo 'active';?>" href="/call-center/success-stories/live-video-audio-text-monitoring-to-internet-firm.php">FWS Provided Video, Audio, &amp; Text Monitoring Services to a Prominent South Asian Internet Company</a></li>
			<li><a class="dropdown-item <?php if($page == "b2b-appointment-setting-cleaning-service-firm") echo 'active';?>" href="/call-center/success-stories/b2b-appointment-setting-cleaning-service-firm.php">Flatworld Solutions Provided B2B Appointment Setting Services to a Leading Cleaning Service Company</a></li>
			<li><a class="dropdown-item <?php if($page == "case-study-product-support-services") echo 'active';?>" href="/call-center/success-stories/case-study-product-support-services.php">Product Support Services</a></li>
			<li><a class="dropdown-item <?php if($page == "case-study-bpo-services") echo 'active';?>" href="/call-center/success-stories/case-study-bpo-services.php">BPO Services</a></li>
			<li><a class="dropdown-item <?php if($page == "case-study-lead-generation-services") echo 'active';?>" href="/call-center/success-stories/case-study-lead-generation-services.php">Lead Generation Services</a></li>
			<li><a class="dropdown-item <?php if($page == "case-study-customer-support") echo 'active';?>" href="/call-center/success-stories/case-study-customer-support.php">Customer Support Services</a></li>
			<li><a class="dropdown-item <?php if($page == "outbound-call-center-services-support") echo 'active';?>" href="/call-center/success-stories/outbound-call-center-services-support.php">Outbound Call Center Support Services</a></li>
			<li><a class="dropdown-item <?php if($page == "inbound-tech-support-services") echo 'active';?>" href="/call-center/success-stories/inbound-tech-support-services.php">Inbound Tech Support Services</a></li>
			<li><a class="dropdown-item <?php if($page == "case-study-disaster-recovery-services") echo 'active';?>" href="/call-center/success-stories/case-study-disaster-recovery-services.php">Disaster Recovery Services</a></li>
			<li><a class="dropdown-item <?php if($page == "case-study-health-company-cati") echo 'active';?>" href="/call-center/success-stories/case-study-health-company-cati.php">CATI Services for a Health Insurance Company</a></li>
			<li><a class="dropdown-item <?php if($page == "case-study-cati") echo 'active';?>" href="/call-center/success-stories/case-study-cati.php">CATI field Services</a></li>
			<li><a class="dropdown-item <?php if($page == "cati") echo 'active';?>" href="/success-stories/call-center/cati.php">CATI Market Research</a></li>
			<li><a class="dropdown-item <?php if($page == "business-continuity") echo 'active';?>" href="/insurance/case-studies/business-continuity.php">Business Continuity Services</a></li>
			<li><a class="dropdown-item <?php if($page == "callcenter-offshore-outsourcing") echo 'active';?>" href="/success-stories/call-center/callcenter-offshore-outsourcing.php">Offshore Outsourcing</a></li>
			<li><a class="dropdown-item <?php if($page == "callcenter-customer-support-services") echo 'active';?>" href="/success-stories/call-center/callcenter-customer-support-services.php">Tier 1 Customer Support Services</a></li>
			<li><a class="dropdown-item <?php if($page == "bpo-platform-implementation-services") echo 'active';?>" href="/success-stories/call-center/bpo-platform-implementation-services.php">BPO Platform Implementation Services</a></li>
			<li><a class="dropdown-item <?php if($page == "cctv-surveillance-service") echo 'active';?>" href="/success-stories/call-center/cctv-surveillance-service.php">CCTV Surveillance and Monitoring Services</a></li>
			<li><a class="dropdown-item <?php if($page == "chat-support-for-blockchain-company") echo 'active';?>" href="/call-center/success-stories/chat-support-for-blockchain-company.php">Flatworld Provided Chat Support Services to a Blockchain Company</a></li>
		</ul>
		</div>
 </li>
			
			

			
			</ul>
			</div>
        </div>
    </nav>
</section>