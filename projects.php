<?php
/**
 * Projects Listing Page - Patna Exhibition Projects
 */

$meta_title = "Patna Exhibition Projects | Best Stall Designs in Bihar | Concept World";
$meta_description = "View our complete portfolio of exhibition stall designs and projects in Patna, Bihar. Premium booth fabrication for APICON, Beauty Expo, Medical Expo, Solar Expo and more.";
$meta_keywords = "patna exhibition projects, bihar exhibition stalls, exhibition booth patna, stall design portfolio";

include 'includes/header.php';
include 'includes/navbar.php';

// Fetch all projects with pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$category = isset($_GET['category']) ? sanitize_input($_GET['category']) : '';

$limit = ITEMS_PER_PAGE;
$offset = ($page - 1) * $limit;

// Get projects
$all_projects = get_all_projects();
$categories = array_unique(array_column($all_projects, 'category'));
?>

<!-- Hero Section -->
<section class="page-header bg-gradient-primary text-white text-center py-5" style="margin-top: 70px;">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3" data-aos="fade-down">Our Patna Exhibition Projects</h1>
        <p class="lead mb-4" data-aos="fade-up">Showcasing Excellence in Exhibition Stall Design & Fabrication</p>
        <nav aria-label="breadcrumb" data-aos="fade-up">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white-50">Patna Projects</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Projects Section -->
<section class="py-5">
    <div class="container">
        
        <!-- Category Filter -->
        <div class="mb-5" data-aos="fade-up">
            <div class="d-flex flex-wrap gap-2 justify-content-center">
                <a href="<?php echo SITE_URL; ?>/projects.php" class="btn btn-sm <?php echo empty($category) ? 'btn-primary' : 'btn-outline-primary'; ?>">
                    All Projects
                </a>
                <?php foreach ($categories as $cat): ?>
                    <a href="<?php echo SITE_URL; ?>/projects.php?category=<?php echo urlencode($cat); ?>" 
                       class="btn btn-sm <?php echo ($category === $cat) ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        <?php echo htmlspecialchars($cat); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Projects Grid -->
        <div class="row g-4">
            <?php 
            $filtered_projects = $category ? array_filter($all_projects, function($p) use ($category) {
                return $p['category'] === $category;
            }) : $all_projects;
            
            if ($filtered_projects): 
                foreach ($filtered_projects as $index => $project): 
            ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo ($index % 6) * 50; ?>">
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
                                 onerror="this.src='https://via.placeholder.com/400x250?text=<?php echo urlencode($project['project_name']); ?>'">
                            <div class="project-overlay">
                                <a href="<?php echo SITE_URL; ?>/project-details.php?slug=<?php echo urlencode($project['project_slug']); ?>" 
                                   class="btn btn-light btn-sm">
                                    <i class="fas fa-eye me-1"></i> View Details
                                </a>
                            </div>
                            <?php if ($project['is_featured']): ?>
                            <span class="badge bg-warning position-absolute top-0 start-0 m-3">Featured</span>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($project['category']); ?></span>
                            <h5 class="card-title"><?php echo htmlspecialchars($project['project_name']); ?></h5>
                            <p class="card-text text-muted mb-2">
                                <i class="fas fa-building me-2"></i>
                                <strong>Client:</strong> <?php echo htmlspecialchars($project['client_name']); ?>
                            </p>
                            <p class="card-text text-muted mb-2">
                                <i class="fas fa-calendar-alt me-2"></i>
                                <strong>Event:</strong> <?php echo htmlspecialchars($project['event_name']); ?>
                            </p>
                            <p class="card-text text-muted mb-3">
                                <i class="fas fa-calendar me-2"></i>
                                <strong>Date:</strong> <?php echo format_date($project['event_date']); ?>
                            </p>
                            <a href="<?php echo SITE_URL; ?>/project-details.php?slug=<?php echo urlencode($project['project_slug']); ?>" 
                               class="btn btn-outline-primary btn-sm w-100">
                                View Project Details <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach;
            else: 
            ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i> No projects found in this category.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-lg bg-gradient-primary text-white">
            <div class="card-body p-5 text-center">
                <h2 class="display-6 fw-bold mb-3">Want Your Project to be Featured Here?</h2>
                <p class="lead mb-4">Let's create an outstanding exhibition stall for your next trade show or expo!</p>
                <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-warning btn-lg px-5">
                    <i class="fas fa-phone-alt me-2"></i> Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
