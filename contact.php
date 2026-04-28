<?php
/**
 * Contact Us Page with Form Processing
 */

$meta_title = "Contact Us | Exhibition Stall Designer Patna | Concept World";
$meta_description = "Get in touch with Concept World for exhibition stall design inquiries. Contact our offices in Patna, Delhi, Dubai, and Mumbai. Call +91 8092471472 or visit us.";
$meta_keywords = "contact exhibition designer Patna, exhibition stall inquiry Bihar, booth design contact, concept world offices";

include 'includes/header.php';
include 'includes/navbar.php';

// Handle form submission
$form_success = false;
$form_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        $form_error = 'Invalid form submission. Please try again.';
    } else {
        // Sanitize input
        $name = sanitize_input($_POST['name']);
        $email = sanitize_input($_POST['email']);
        $phone = sanitize_input($_POST['phone']);
        $subject = sanitize_input($_POST['subject']);
        $message = sanitize_input($_POST['message']);
        
        // Validate inputs
        if (empty($name) || empty($email) || empty($message)) {
            $form_error = 'Please fill in all required fields.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $form_error = 'Please enter a valid email address.';
        } else {
            // Save to database
            $inquiry_data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'subject' => $subject,
                'message' => $message
            ];
            
            if (save_contact_inquiry($inquiry_data)) {
                $form_success = true;
                
                // Send email notification (optional)
                $to = ADMIN_EMAIL;
                $email_subject = "New Contact Inquiry: " . $subject;
                $email_message = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
                $headers = "From: " . NOREPLY_EMAIL . "\r\n";
                $headers .= "Reply-To: $email\r\n";
                
                @mail($to, $email_subject, $email_message, $headers);
            } else {
                $form_error = 'An error occurred. Please try again later.';
            }
        }
    }
}

// Get office locations
$offices = get_all_offices();
?>

<!-- Hero Section -->
<section class="page-header bg-gradient-primary text-white text-center py-5" style="margin-top: 70px;">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3" data-aos="fade-down">Get In Touch With Us</h1>
        <p class="lead mb-0" data-aos="fade-up">We're here to help bring your exhibition vision to life</p>
    </div>
</section>

<!-- Success/Error Messages -->
<?php if ($form_success): ?>
<div class="container mt-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        <strong>Thank you!</strong> Your message has been received. We'll get back to you soon.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
<?php endif; ?>

<?php if ($form_error): ?>
<div class="container mt-4">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        <strong>Error!</strong> <?php echo htmlspecialchars($form_error); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
<?php endif; ?>

<!-- Contact Form & Info Section -->
<section class="py-5" id="quote">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="card-title mb-4">Send Us a Message</h3>
                        
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>#quote">
                            <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Subject</label>
                                    <select class="form-select" id="subject" name="subject">
                                        <option value="General Inquiry">General Inquiry</option>
                                        <option value="Exhibition Stall Design">Exhibition Stall Design</option>
                                        <option value="Booth Fabrication">Booth Fabrication</option>
                                        <option value="Get a Quote">Get a Quote</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                
                                <div class="col-12">
                                    <label for="message" class="form-label">Your Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-5" data-aos="fade-left">
                <div class="mb-4">
                    <h3 class="mb-4">Contact Information</h3>
                    <p class="text-muted mb-4">
                        Have questions about our exhibition stall design services? 
                        We're here to help! Reach out through any of our offices or contact channels.
                    </p>
                </div>
                
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Call Us</h6>
                                <a href="tel:+918092471472" class="text-decoration-none">+91 8092471472</a><br>
                                <a href="tel:+918092471471" class="text-decoration-none">+91 8092471471</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-success bg-opacity-10 text-success rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Email Us</h6>
                                <a href="mailto:info@conceptworld.in" class="text-decoration-none">info@conceptworld.in</a><br>
                                <a href="mailto:contact@conceptworld.in" class="text-decoration-none">contact@conceptworld.in</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <div class="icon-box bg-warning bg-opacity-10 text-warning rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">WhatsApp</h6>
                                <a href="https://wa.me/918092471472" class="text-decoration-none" target="_blank">
                                    +91 8092471472
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h6 class="mb-3">Follow Us</h6>
                        <div class="d-flex gap-2">
                            <a href="<?php echo FACEBOOK_URL; ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="<?php echo INSTAGRAM_URL; ?>" class="btn btn-outline-danger btn-sm" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="<?php echo LINKEDIN_URL; ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="<?php echo TWITTER_URL; ?>" class="btn btn-outline-info btn-sm" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Office Locations -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold mb-3" data-aos="fade-up">Our Office Locations</h2>
            <p class="lead text-muted" data-aos="fade-up">Visit us at any of our offices across India and UAE</p>
        </div>
        
        <div class="row g-4">
            <?php if ($offices): foreach ($offices as $index => $office): ?>
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="card border-0 shadow-sm h-100 <?php echo $office['office_type'] === 'headquarters' ? 'border-primary border-3' : ''; ?>">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="icon-box bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-<?php echo $office['office_type'] === 'headquarters' ? 'building' : 'map-marker-alt'; ?>"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1"><?php echo htmlspecialchars($office['office_name']); ?></h5>
                                <?php if ($office['office_type'] === 'headquarters'): ?>
                                <span class="badge bg-warning">Headquarters</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <p class="text-muted mb-2">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <?php echo htmlspecialchars($office['address']); ?>
                            <?php if ($office['city']) echo ', ' . htmlspecialchars($office['city']); ?>
                            <?php if ($office['state']) echo ', ' . htmlspecialchars($office['state']); ?>
                        </p>
                        
                        <?php if ($office['phone_1']): ?>
                        <p class="text-muted mb-2">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <a href="tel:<?php echo str_replace(' ', '', $office['phone_1']); ?>" class="text-decoration-none">
                                <?php echo htmlspecialchars($office['phone_1']); ?>
                            </a>
                            <?php if ($office['phone_2']): ?>
                            , <a href="tel:<?php echo str_replace(' ', '', $office['phone_2']); ?>" class="text-decoration-none">
                                <?php echo htmlspecialchars($office['phone_2']); ?>
                            </a>
                            <?php endif; ?>
                        </p>
                        <?php endif; ?>
                        
                        <?php if ($office['email']): ?>
                        <p class="text-muted mb-2">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <a href="mailto:<?php echo $office['email']; ?>" class="text-decoration-none">
                                <?php echo htmlspecialchars($office['email']); ?>
                            </a>
                        </p>
                        <?php endif; ?>
                        
                        <?php if ($office['website']): ?>
                        <p class="text-muted mb-0">
                            <i class="fas fa-globe text-primary me-2"></i>
                            <a href="<?php echo htmlspecialchars($office['website']); ?>" class="text-decoration-none" target="_blank">
                                <?php echo htmlspecialchars($office['website']); ?>
                            </a>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- Map Section (Optional - Requires Google Maps API) -->
<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-sm" data-aos="fade-up">
            <div class="card-body p-0">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.3728!2d85.1376!3d25.5941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDM1JzM4LjgiTiA4NcKwMDgnMTUuNCJF!5e0!3m2!1sen!2sin!4v1234567890" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
