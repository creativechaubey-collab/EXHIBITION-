<?php
/**
 * Project Details Page - Individual Project View
 */

include 'includes/header.php';
include 'includes/navbar.php';

// Get project slug from URL
$slug = isset($_GET['slug']) ? sanitize_input($_GET['slug']) : '';

if (empty($slug)) {
    redirect(SITE_URL . '/projects.php');
}

// Fetch project details
$project = get_project_by_slug($slug);

if (!$project) {
    redirect(SITE_URL . '/projects.php');
}

// Get project images
$project_images = get_project_images($project['project_id']);

// Update page meta
$meta_title = $project['meta_title'] ? $project['meta_title'] : $project['project_name'] . ' | Concept World';
$meta_description = $project['meta_description'] ? $project['meta_description'] : truncate_text($project['description'], 160);
$meta_keywords = $project['meta_keywords'] ? $project['meta_keywords'] : $project['project_name'] . ', ' . $project['category'];
$page_og_image = SITE_URL . '/' . ($project['featured_image'] ? $project['featured_image'] : $project['primary_image']);
?>

<!-- Breadcrumb Section -->
<section class="bg-light py-3" style="margin-top: 70px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/projects.php">Projects</a></li>
                <li class="breadcrumb-item active"><?php echo htmlspecialchars($project['project_name']); ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Project Details Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Project Gallery -->
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm mb-4" data-aos="fade-right">
                    <div class="card-body p-0">
                        <?php if ($project_images && count($project_images) > 0): ?>
                        <!-- Main Image Carousel -->
                        <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php foreach ($project_images as $index => $image): ?>
                                <button type="button" data-bs-target="#projectCarousel" 
                                        data-bs-slide-to="<?php echo $index; ?>" 
                                        class="<?php echo $index === 0 ? 'active' : ''; ?>" 
                                        aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" 
                                        aria-label="Slide <?php echo $index + 1; ?>"></button>
                                <?php endforeach; ?>
                            </div>
                            <div class="carousel-inner">
                                <?php foreach ($project_images as $index => $image): ?>
                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                    <img src="<?php echo SITE_URL . '/' . htmlspecialchars($image['image_path']); ?>" 
                                         class="d-block w-100" 
                                         alt="<?php echo htmlspecialchars($image['image_alt'] ? $image['image_alt'] : $project['project_name']); ?>"
                                         style="max-height: 500px; object-fit: cover;">
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        
                        <!-- Thumbnail Gallery -->
                        <div class="p-3">
                            <div class="row g-2">
                                <?php foreach ($project_images as $index => $image): ?>
                                <div class="col-3">
                                    <img src="<?php echo SITE_URL . '/' . htmlspecialchars($image['image_path']); ?>" 
                                         class="img-thumbnail cursor-pointer" 
                                         alt="Thumbnail <?php echo $index + 1; ?>"
                                         style="height: 100px; width: 100%; object-fit: cover;"
                                         onclick="document.querySelector('[data-bs-slide-to=\'<?php echo $index; ?>\']').click();">
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php else: ?>
                        <img src="https://via.placeholder.com/800x500?text=No+Images+Available" 
                             class="card-img-top" 
                             alt="No images">
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Project Description -->
                <div class="card border-0 shadow-sm" data-aos="fade-right" data-aos-delay="100">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">Project Description</h3>
                        <p class="text-muted">
                            <?php echo nl2br(htmlspecialchars($project['description'])); ?>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Project Info Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4" data-aos="fade-left">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4"><?php echo htmlspecialchars($project['project_name']); ?></h4>
                        <span class="badge bg-primary mb-3"><?php echo htmlspecialchars($project['category']); ?></span>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <strong class="d-block mb-2"><i class="fas fa-building text-primary me-2"></i> Client</strong>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($project['client_name']); ?></p>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <strong class="d-block mb-2"><i class="fas fa-calendar-alt text-primary me-2"></i> Event Name</strong>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($project['event_name']); ?></p>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <strong class="d-block mb-2"><i class="fas fa-calendar text-primary me-2"></i> Event Date</strong>
                            <p class="text-muted mb-0"><?php echo format_date($project['event_date'], 'F d, Y'); ?></p>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <strong class="d-block mb-2"><i class="fas fa-map-marker-alt text-primary me-2"></i> Location</strong>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($project['location']); ?></p>
                        </div>
                        
                        <?php if ($project['stall_size']): ?>
                        <hr>
                        <div class="mb-3">
                            <strong class="d-block mb-2"><i class="fas fa-ruler-combined text-primary me-2"></i> Stall Size</strong>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($project['stall_size']); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <strong class="d-block mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Status</strong>
                            <span class="badge bg-success"><?php echo ucfirst($project['project_status']); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Card -->
                <div class="card border-0 shadow-sm bg-primary text-white" data-aos="fade-left" data-aos-delay="100">
                    <div class="card-body p-4 text-center">
                        <h5 class="card-title mb-3">Interested in Similar Design?</h5>
                        <p class="card-text mb-4">Let's discuss your exhibition needs and create something amazing!</p>
                        <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-warning w-100">
                            <i class="fas fa-envelope me-2"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Share Section -->
        <div class="mt-5 text-center" data-aos="fade-up">
            <h5 class="mb-3">Share This Project</h5>
            <div class="d-flex gap-2 justify-content-center">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($page_url); ?>" 
                   class="btn btn-primary btn-sm" target="_blank">
                    <i class="fab fa-facebook-f me-1"></i> Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($page_url); ?>&text=<?php echo urlencode($project['project_name']); ?>" 
                   class="btn btn-info btn-sm text-white" target="_blank">
                    <i class="fab fa-twitter me-1"></i> Twitter
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($page_url); ?>" 
                   class="btn btn-primary btn-sm" target="_blank" style="background-color: #0077b5;">
                    <i class="fab fa-linkedin-in me-1"></i> LinkedIn
                </a>
                <a href="https://wa.me/?text=<?php echo urlencode($project['project_name'] . ' - ' . $page_url); ?>" 
                   class="btn btn-success btn-sm" target="_blank">
                    <i class="fab fa-whatsapp me-1"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="text-center mb-5" data-aos="fade-up">More Projects in <?php echo htmlspecialchars($project['category']); ?></h3>
        
        <div class="row g-4">
            <?php 
            $related_projects = get_all_projects(3);
            $related_projects = array_filter($related_projects, function($p) use ($project) {
                return $p['category'] === $project['category'] && $p['project_id'] !== $project['project_id'];
            });
            $related_projects = array_slice($related_projects, 0, 3);
            
            foreach ($related_projects as $index => $rel_project):
            ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="card border-0 shadow-sm h-100">
                    <img src="<?php echo SITE_URL . '/' . ($rel_project['featured_image'] ? $rel_project['featured_image'] : $rel_project['primary_image']); ?>" 
                         class="card-img-top" 
                         alt="<?php echo htmlspecialchars($rel_project['project_name']); ?>"
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($rel_project['project_name']); ?></h5>
                        <a href="<?php echo SITE_URL; ?>/project-details.php?slug=<?php echo urlencode($rel_project['project_slug']); ?>" 
                           class="btn btn-outline-primary btn-sm">
                            View Details <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
