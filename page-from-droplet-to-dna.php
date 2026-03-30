<?php
/**
 * Template Name: Kemin PHILSAN Event Page
 * Description: From Droplets to DNA – PHILSAN 2026 event landing page
 */

get_header(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>From Droplets to DNA | PHILSAN 2026 | Kemin</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'kemin-red':    '#C8272D',
            'kemin-dark':   '#1a1a1a',
            'kemin-gold':   '#C9A84C',
            'kemin-cream':  '#FAF7F2',
            'kemin-muted':  '#6B6B6B',
          },
          fontFamily: {
            display: ['"Playfair Display"', 'serif'],
            body:    ['"DM Sans"', 'sans-serif'],
          },
        }
      }
    };
  </script>

  <style>
    /* ── Base ── */
    *, *::before, *::after { box-sizing: border-box; }
    body { font-family: 'DM Sans', sans-serif; background: #FAF7F2; color: #1a1a1a; margin: 0; }

    /* ── Hero background with golden bokeh feel ── */
    .hero-bg {
      background: radial-gradient(ellipse at 70% 30%, #3a2a00 0%, #1a1000 55%, #000 100%);
      position: relative;
      overflow: hidden;
    }
    /* When a WP Featured Image is present it becomes a full-cover background */
    .hero-bg .hero-banner-img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      z-index: 0;
      opacity: 1; /* darken so text stays readable */
    }
    /* Dark gradient overlay on top of the image */
    .hero-bg::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        linear-gradient(to right, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.30) 100%),
        radial-gradient(circle at 68% 20%, rgba(201,168,76,0.20) 0%, transparent 38%),
        radial-gradient(circle at 80% 60%, rgba(201,168,76,0.10) 0%, transparent 30%);
      pointer-events: none;
      z-index: 1;
    }
    /* ── Divider line ── */
    .accent-line { width: 3.5rem; height: 3px; background: #C8272D; }

    /* ── Speaker card ── */
    .speaker-card {
      background: #fff;
      border-top: 4px solid #C8272D;
      box-shadow: 0 8px 40px rgba(0,0,0,0.08);
    }

    /* ── Badge pill ── */
    .event-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: #C8272D;
      color: #fff;
      font-family: 'DM Sans', sans-serif;
      font-weight: 600;
      font-size: 0.78rem;
      letter-spacing: 0.07em;
      text-transform: uppercase;
      padding: 0.5rem 1.1rem;
      border-radius: 2px;
    }

    /* ── Credential chip ── */
    .cred-chip {
      display: inline-block;
      background: #FAF7F2;
      border: 1px solid #e2ddd4;
      border-radius: 2px;
      font-size: 0.78rem;
      font-weight: 500;
      color: #1a1a1a;
      padding: 0.25rem 0.65rem;
      white-space: nowrap;
    }

    /* ── Section fade-in ── */
    .fade-up {
      opacity: 0;
      transform: translateY(24px);
      transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .fade-up.visible { opacity: 1; transform: translateY(0); }

    /* ── Photo frame ── */
    .photo-wrap {
      position: relative;
      display: inline-block;
    }
    .photo-wrap::before {
      content: '';
      position: absolute;
      top: 10px; left: 10px;
      width: 100%; height: 100%;
      border: 2px solid #C8272D;
      border-radius: 50%;
      z-index: 0;
    }
    .photo-wrap img {
      position: relative;
      z-index: 1;
      border-radius: 50%;
      display: block;
      object-fit: cover;
    }

    /* ── Footer strip ── */
    .footer-strip {
      border-top: 1px solid #E2DDD4;
      background: #fff;
    }

    /* ── Responsive: stack logos on small screens ── */
    @media (max-width: 480px) {
      .logos-row { flex-direction: column; align-items: flex-start; gap: 1.5rem; }
    }
  </style>
</head>

<body class="antialiased">

<!-- ═══════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════ -->
<section class="hero-bg min-h-[520px] md:min-h-[600px] px-6 md:px-16 py-16 flex flex-col justify-end relative">

  <?php
    /*
     * ── Hero Banner Image ──────────────────────────────────────────────────────
     * Set the page's Featured Image in WordPress (Dashboard → Edit Page →
     * "Featured Image" panel) and it will automatically appear here as the
     * full-cover hero background.
     *
     * You can also hard-code any WordPress media URL like:
     *   $hero_img_url = 'https://yoursite.com/wp-content/uploads/your-banner.jpg';
     */
    if ( has_post_thumbnail() ) :
      $hero_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    else :
      // Fallback: replace this URL with any image from your WP Media Library
      $hero_img_url = '';
    endif;

    if ( ! empty( $hero_img_url ) ) : ?>
      <img
        src="<?php echo esc_url( $hero_img_url ); ?>"
        alt="<?php echo esc_attr( get_the_title() ); ?> – Hero Banner"
        class="hero-banner-img"
        loading="eager"
        decoding="async"
      />
  <?php endif; ?>

  <!-- Content -->
  <div class="relative z-[3] max-w-4xl fade-up" id="hero-text">
    <div class="event-badge mb-6">
      <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="6" cy="6" r="5" stroke="white" stroke-width="1.2"/>
        <path d="M6 3.5V6.5L7.5 8" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
      </svg>
      16 April 2026 &nbsp;|&nbsp; PHILSAN, Philippines
    </div>

    <h1 class="font-display text-white leading-tight mb-4"
        style="font-size: clamp(2rem, 5vw, 3.6rem); font-weight: 900; letter-spacing: -0.01em;">
      From Droplets<br/>to DNA
    </h1>

    <p class="text-kemin-gold font-body font-medium mb-8"
       style="font-size: clamp(0.9rem, 2vw, 1.1rem); letter-spacing: 0.04em; text-transform: uppercase;">
      The New Science of Bioemulsifiers<br/>and Nutrient Absorption
    </p>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
     ABOUT SECTION
═══════════════════════════════════════════════ -->
<section class="bg-white px-6 md:px-16 py-14 md:py-20">
  <div class="max-w-4xl mx-auto fade-up">
    <div class="accent-line mb-6"></div>
    <h2 class="font-display text-kemin-dark mb-6" style="font-size:clamp(1.4rem,3vw,2rem);font-weight:700;">
      About the Session
    </h2>
    <p class="font-body text-gray-700 leading-relaxed" style="font-size:1.05rem; max-width:740px;">
      <strong>From Droplets to DNA</strong> explores the next generation of fat digestion science, where performance
      is no longer defined by emulsification alone. As advances in bioemulsifier technology reshape our understanding
      of lipid utilisation, the focus is shifting decisively toward nutrient absorption and metabolic efficiency.
    </p>
    <p class="font-body text-gray-700 leading-relaxed mt-4" style="font-size:1.05rem; max-width:740px;">
      At the same time, nutrigenomics is emerging as a critical lens, revealing how absorbed fats and nutrients
      influence gene expression and biological outcomes. This session will delve into cutting-edge innovations in
      lipid digestibility, absorption-focused nutrition, and nutrient–gene interactions, translating science into
      practical strategies for improved feed efficiency and animal performance.
    </p>

    <!-- Key topic pills -->
    <div class="flex flex-wrap gap-3 mt-8">
      <?php
        $topics = [
          'Lipid Digestibility',
          'Bioemulsifier Technology',
          'Nutrient Absorption',
          'Metabolic Efficiency',
          'Nutrigenomics',
          'Gene Expression',
          'Feed Efficiency',
          'Animal Performance',
        ];
        foreach ($topics as $topic) :
      ?>
        <span class="cred-chip"><?php echo esc_html($topic); ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
     SPEAKER SECTION
═══════════════════════════════════════════════ -->
<section class="bg-kemin-cream px-6 md:px-16 py-14 md:py-20">
  <div class="max-w-4xl mx-auto">
    <div class="fade-up">
      <div class="accent-line mb-6"></div>
      <p class="font-body text-kemin-red font-semibold text-sm tracking-widest uppercase mb-2">Featured Speaker</p>
      <h2 class="font-display text-kemin-dark mb-10" style="font-size:clamp(1.4rem,3vw,2rem);font-weight:700;">
        Meet the Expert
      </h2>
    </div>

    <div class="speaker-card rounded-sm p-8 md:p-10 fade-up">
      <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start">

        <!-- Photo -->
        <div class="flex-shrink-0 flex flex-col items-center gap-4">
          <div class="photo-wrap">
            <?php
              // Replace the src below with the actual speaker image URL via WordPress
              $speaker_img = get_template_directory_uri() . '/assets/images/zancia-swart.jpg';
            ?>
            <img
                 alt="Zancia Swart – Product Manager, Kemin Animal Nutrition and Health"
                 width="150" 
                 height="150"
                 src="https://philsan.org/wp-content/uploads/2026/03/Frame-42.png"
                 style="width:150px;height:150px;" />
          </div>
        </div>

        <!-- Info -->
        <div class="flex-1">
          <h3 class="font-display text-kemin-dark" style="font-size:1.7rem;font-weight:700;">Zancia Swart</h3>
          <p class="font-body text-kemin-red font-medium text-sm tracking-wide mt-1 mb-4 uppercase">
            Product Manager, Kemin Animal Nutrition and Health, Asia Pacific
          </p>

          <!-- Credentials row -->
          <div class="flex flex-wrap gap-2 mb-5">
            <span class="cred-chip">BSc Agric – Animal Sciences</span>
            <span class="cred-chip">MSc Agric – Animal Nutrition</span>
            <span class="cred-chip">University of Pretoria</span>
          </div>

          <p class="font-body text-gray-700 leading-relaxed mb-3" style="font-size:0.97rem;">
            Zancia Swart is a Product Manager at Kemin Industries (Asia Pacific), specializing in nutritional
            technologies that enhance feed efficiency, energy utilization, and overall performance in monogastric
            production systems. She brings more than a decade of experience across poultry nutrition, feed additives,
            and commercial production environments—including technical sales support, product management, and
            marketing communication roles within Kemin's global organization.
          </p>
          <p class="font-body text-gray-700 leading-relaxed mb-3" style="font-size:0.97rem;">
            Her expertise is grounded in a strong scientific background. Her research focused on lipid digestion,
            metabolizable energy evaluation, and the use of lysophospholipids in broiler nutrition.
          </p>
          <p class="font-body text-gray-700 leading-relaxed" style="font-size:0.97rem;">
            Today, she plays a key role in driving product-strategy execution across diverse APAC markets,
            integrating technical insights with commercial application to support producers, feed mills, and integrators.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════
     EVENT DETAILS STRIP
═══════════════════════════════════════════════ -->
<section class="bg-kemin-dark px-6 md:px-16 py-10 fade-up">
  <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-8 text-center sm:text-left">

    <div class="flex flex-col sm:flex-row sm:items-start gap-3">
      <div class="flex-shrink-0 w-10 h-10 rounded-full bg-kemin-red flex items-center justify-center mx-auto sm:mx-0">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8">
          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
          <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
          <line x1="3" y1="10" x2="21" y2="10"/>
        </svg>
      </div>
      <div>
        <p class="font-body text-kemin-gold text-xs font-semibold tracking-widest uppercase mb-1">Date</p>
        <p class="font-display text-white" style="font-size:1.1rem;font-weight:700;">16 April 2026</p>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-start gap-3">
      <div class="flex-shrink-0 w-10 h-10 rounded-full bg-kemin-red flex items-center justify-center mx-auto sm:mx-0">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8">
          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
          <circle cx="12" cy="9" r="2.5"/>
        </svg>
      </div>
      <div>
        <p class="font-body text-kemin-gold text-xs font-semibold tracking-widest uppercase mb-1">Location</p>
        <p class="font-display text-white" style="font-size:1.1rem;font-weight:700;">Philippines</p>
        <p class="font-body text-gray-400 text-sm">PHILSAN Annual Convention</p>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-start gap-3">
      <div class="flex-shrink-0 w-10 h-10 rounded-full bg-kemin-red flex items-center justify-center mx-auto sm:mx-0">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8">
          <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
          <circle cx="9" cy="7" r="4"/>
          <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
          <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
        </svg>
      </div>
      <div>
        <p class="font-body text-kemin-gold text-xs font-semibold tracking-widest uppercase mb-1">Organiser</p>
        <p class="font-display text-white" style="font-size:1.1rem;font-weight:700;">Kemin Industries</p>
        <p class="font-body text-gray-400 text-sm">Animal Nutrition &amp; Health, APAC</p>
      </div>
    </div>

  </div>
</section>


<!-- ═══════════════════════════════════════════════
     FOOTER / LOGOS
═══════════════════════════════════════════════ -->
<footer class="footer-strip px-6 md:px-16 py-8">
  <div class="max-w-4xl mx-auto">
    <div class="logos-row flex flex-row items-center justify-between gap-6">

      <!-- Kemin logo — replace src with your actual image URL -->
      <img
        src="https://philsan.org/wp-content/uploads/2025/06/Kemin.png"
        alt="Kemin – Compelled by Curiosity"
        style="height: 48px; width: auto;"
      />

      <!-- Divider -->
      <div class="hidden sm:block w-px bg-gray-200 self-stretch"></div>

      <!-- PHILSAN logo — replace src with your actual image URL -->
      <img
        src="https://philsan.org/wp-content/uploads/2025/06/PHILSAN_LOGO.png"
        alt="PHILSAN – Philippine Society of Animal Nutritionists"
        style="height: 48px; width: auto;"
      />

    </div>

    <!-- Copyright -->
    <p class="font-body text-kemin-muted mt-6 text-center" style="font-size:0.7rem; line-height:1.6;">
      © Kemin Industries, Inc. and its group of companies 2026. All rights reserved.
      ® ™ Trademarks of Kemin Industries, Inc., U.S.A.<br/>
      Certain statements, product labeling and claims may differ by geography or as required by government requirements.
      <a href="https://www.kemin.com" class="underline text-kemin-red hover:text-kemin-dark transition-colors ml-1"
         target="_blank" rel="noopener noreferrer">www.kemin.com</a>
    </p>
  </div>
</footer>


<!-- ═══════════════════════════════════════════════
     SCROLL ANIMATION SCRIPT
═══════════════════════════════════════════════ -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Trigger hero text immediately
    setTimeout(() => {
      document.getElementById('hero-text')?.classList.add('visible');
    }, 100);

    // Observe all fade-up elements
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          // slight stagger for grouped children
          setTimeout(() => entry.target.classList.add('visible'), i * 80);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
  });
</script>

</body>
</html>

<?php get_footer(); ?>
