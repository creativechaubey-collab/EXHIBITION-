<?php
/**
 * Concept World - Main Homepage
 * Bootstrap 5 + PHP + MySQL Powered Website
 */

// Page-specific SEO data
$meta_title = "Exhibition Stall Designer Patna | Exhibition Stand Builders Bihar | Concept World";
$meta_description = "Leading Exhibition Stall Designer in Patna, Bihar. Premium exhibition stand builders offering custom booth design, fabrication & installation services for trade shows, expos & exhibitions.";
$meta_keywords = "exhibition stall design Patna, exhibition stand builders Patna, exhibition booth design Bihar, stall fabrication Patna, trade show booth Patna";

// Include header
include 'includes/header.php';
include 'includes/navbar.php';

// Fetch data from database
$featured_projects = get_all_projects(6, true);
$services = get_all_services();
$testimonials = get_all_testimonials(3);
?>

<!-- Hero Section -->
<section class="hero-section bg-gradient-primary text-white" style="margin-top: 70px; padding: 100px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4">
                    Leading Exhibition <span class="text-warning">Stall Designer</span> in Patna
                </h1>
                <p class="lead mb-4">
                    Transform your exhibition presence with premium custom-designed stalls and stands. 
                    Expert fabrication, installation, and complete turnkey solutions for all exhibitions and trade shows.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-warning btn-lg px-5">
                        <i class="fas fa-phone-alt me-2"></i> Get Started
                    </a>
                    <a href="<?php echo SITE_URL; ?>/portfolio.php" class="btn btn-outline-light btn-lg px-5">
                        <i class="fas fa-images me-2"></i> View Portfolio
                    </a>
                </div>
                
                <!-- Stats Counter -->
                <div class="row mt-5 g-4">
                    <div class="col-4">
                        <h3 class="display-6 fw-bold mb-0">500+</h3>
                        <p class="mb-0">Projects Done</p>
                    </div>
                    <div class="col-4">
                        <h3 class="display-6 fw-bold mb-0">350+</h3>
                        <p class="mb-0">Happy Clients</p>
                    </div>
                    <div class="col-4">
                        <h3 class="display-6 fw-bold mb-0">15+</h3>
                        <p class="mb-0">Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="<?php echo IMAGES_PATH; ?>/hero-image.jpg" alt="Exhibition Stall Design" class="img-fluid rounded-4 shadow-lg" onerror="this.src='https://via.placeholder.com/600x400?text=Exhibition+Stall+Design'">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="0">
                <div class="text-center">
                    <div class="icon-box bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-pencil-ruler fa-2x"></i>
                    </div>
                    <h5>Creative Design</h5>
                    <p class="text-muted">Innovative & eye-catching exhibition stall designs</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center">
                    <div class="icon-box bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-hammer fa-2x"></i>
                    </div>
                    <h5>Expert Fabrication</h5>
                    <p class="text-muted">High-quality materials & superior craftsmanship</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <div class="icon-box bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <h5>On-Time Delivery</h5>
                    <p class="text-muted">Timely project completion & installation</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <div class="icon-box bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-headset fa-2x"></i>
                    </div>
                    <h5>24/7 Support</h5>
                    <p class="text-muted">Dedicated support throughout your event</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <img src="<?php echo IMAGES_PATH; ?>/about-us.jpg" alt="About Concept World" class="img-fluid rounded-4 shadow" onerror="this.src='https://via.placeholder.com/600x450?text=About+Us'">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="badge bg-primary mb-3">About Us</span>
                <h2 class="display-5 fw-bold mb-4">Welcome to <?php echo SITE_NAME; ?></h2>
                <p class="text-muted mb-4">
                    With over 15 years of experience in the exhibition industry, Concept World has established itself 
                    as the leading exhibition stall designer and fabricator in Patna, Bihar. We specialize in creating 
                    stunning, customized exhibition stalls and stands that capture attention and drive engagement.
                </p>
                <p class="text-muted mb-4">
                    Our team of expert designers and craftsmen work closely with clients to understand their brand vision 
                    and deliver exhibition solutions that exceed expectations. From concept to completion, we handle every 
                    aspect of your exhibition presence.
                </p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Custom Exhibition Stall Design</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Premium Quality Fabrication</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Complete Installation Services</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Nationwide Exhibition Coverage</li>
                </ul>
                <a href="<?php echo SITE_URL; ?>/about.php" class="btn btn-primary mt-3">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-primary mb-3">Our Services</span>
            <h2 class="display-5 fw-bold mb-3">What We Offer</h2>
            <p class="lead text-muted">Comprehensive exhibition solutions tailored to your needs</p>
        </div>
        
        <div class="row g-4">
            <?php if ($services): ?>
                <?php foreach ($services as $index => $service): ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="card border-0 shadow-sm h-100 service-card">
                        <div class="card-body p-4">
                            <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="<?php echo htmlspecialchars($service['service_icon']); ?> fa-2x"></i>
                            </div>
                            <h4 class="card-title mb-3"><?php echo htmlspecialchars($service['service_name']); ?></h4>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($service['short_description']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-primary btn-lg">
                View All Services <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section id="projects" class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-primary mb-3">Our Work</span>
            <h2 class="display-5 fw-bold mb-3">Featured Patna Projects</h2>
            <p class="lead text-muted">Showcasing our best exhibition stall designs in Patna, Bihar</p>
        </div>
        
        <div class="row g-4">
            <?php if ($featured_projects): ?>
                <?php foreach ($featured_projects as $index => $project): ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="card border-0 shadow-sm project-card h-100">
                        <div class="position-relative overflow-hidden">
                            <?php 
                            $project_image = $project['featured_image'] ? $project['featured_image'] : $project['primary_image'];
                            $image_path = SITE_URL . '/' . $project_image;
                            ?>
                            <img src="<?php echo htmlspecialchars($image_path); ?>" 
                                 class="card-img-top" 
                                 alt="<?php echo htmlspecialchars($project['project_name']); ?>"
                                 style="height: 250px; object-fit: cover;"
                                 onerror="this.src='https://via.placeholder.com/400x250?text=Project+Image'">
                            <div class="project-overlay">
                                <a href="<?php echo SITE_URL; ?>/project-details.php?slug=<?php echo urlencode($project['project_slug']); ?>" class="btn btn-light btn-sm">
                                    <i class="fas fa-eye me-1"></i> View Details
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($project['category']); ?></span>
                            <h5 class="card-title"><?php echo htmlspecialchars($project['project_name']); ?></h5>
                            <p class="card-text text-muted">
                                <i class="fas fa-user me-2"></i> <?php echo htmlspecialchars($project['client_name']); ?>
                            </p>
                            <p class="card-text text-muted">
                                <i class="fas fa-calendar me-2"></i> <?php echo format_date($project['event_date']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="<?php echo SITE_URL; ?>/projects.php" class="btn btn-primary btn-lg">
                View All Patna Projects <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-primary mb-3">Testimonials</span>
            <h2 class="display-5 fw-bold mb-3">What Our Clients Say</h2>
            <p class="lead text-muted">Trusted by leading brands across India</p>
        </div>
        
        <div class="row g-4">
            <?php if ($testimonials): ?>
                <?php foreach ($testimonials as $index => $testimonial): ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="card-text text-muted mb-4">
                                "<?php echo htmlspecialchars($testimonial['testimonial_text']); ?>"
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <strong><?php echo strtoupper(substr($testimonial['client_name'], 0, 1)); ?></strong>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0"><?php echo htmlspecialchars($testimonial['client_name']); ?></h6>
                                    <small class="text-muted"><?php echo htmlspecialchars($testimonial['client_designation']); ?></small>
                                    <small class="text-muted d-block"><?php echo htmlspecialchars($testimonial['client_company']); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="display-5 fw-bold mb-3">Ready to Create Your Perfect Exhibition Stall?</h2>
                <p class="lead mb-0">Let's discuss your exhibition needs and create something amazing together!</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0" data-aos="fade-left">
                <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-warning btn-lg px-5">
                    <i class="fas fa-envelope me-2"></i> Contact Us Now
                </a>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
