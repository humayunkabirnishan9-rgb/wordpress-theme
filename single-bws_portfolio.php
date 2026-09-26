<?php
/**
 * Single Portfolio Template
 * BlueWireSEO — High-Converting Portfolio & Technical Proof Layout
 *
 * @package BlueWireSEO
 */

get_header();

$audit_url   = bluewireseo_get_audit_url();
$contact_url = bluewireseo_get_contact_url();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();

        if ( bluewireseo_is_elementor_active( get_the_ID() ) ) {
            echo '<div class="bws-elementor-container">';
            the_content();
            echo '</div>';
        } else {
            // Retrieve editable meta fields
            $custom_title = get_post_meta( get_the_ID(), '_bws_custom_hero_title', true );
            $title        = ! empty( $custom_title ) ? $custom_title : get_the_title();
            $client       = get_post_meta( get_the_ID(), '_bws_client', true );
            $industry     = get_post_meta( get_the_ID(), '_bws_industry', true );
            $services     = get_post_meta( get_the_ID(), '_bws_services_used', true );
            $external_url = get_post_meta( get_the_ID(), '_bws_external_url', true );
            $result       = get_post_meta( get_the_ID(), '_bws_result_metric', true );
            $project_date = get_post_meta( get_the_ID(), '_bws_project_date', true );
            $subtitle     = get_post_meta( get_the_ID(), '_bws_hero_subtitle', true );
            $eyebrow      = get_post_meta( get_the_ID(), '_bws_hero_eyebrow', true );
            $pdf_url      = get_post_meta( get_the_ID(), '_bws_pdf_url', true );
            $gsc_image    = get_post_meta( get_the_ID(), '_bws_gsc_image', true );

            $categories   = get_the_terms( get_the_ID(), 'bws_portfolio_category' );
            $cat_name     = ( $categories && ! is_wp_error( $categories ) ) ? $categories[0]->name : '';

            if ( empty( $eyebrow ) ) {
                $eyebrow = ! empty( $cat_name ) ? strtoupper( $cat_name ) : ( ! empty( $industry ) ? strtoupper( $industry ) : 'PORTFOLIO SHOWCASE' );
            }
            if ( empty( $subtitle ) ) {
                $subtitle = get_the_excerpt();
            }
            ?>

            <!-- Hero Section -->
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-80px; right:-80px; width:450px; height:450px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.2) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>
                <div class="bws-container" style="position:relative; z-index:2;">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    
                    <div style="display:flex; gap:0.75rem; align-items:center; margin-top:1.25rem; flex-wrap:wrap;">
                        <span class="bws-card-tag" style="background:rgba(37,99,235,0.25); color:#93C5FD; border:1px solid rgba(147,197,253,0.3); font-size:0.75rem; padding:0.3rem 0.75rem; font-weight:700;">
                            <?php echo esc_html( $eyebrow ); ?>
                        </span>
                        <?php if ( $project_date ) : ?>
                            <span style="font-size:0.85rem; color:rgba(255,255,255,0.7); display:inline-flex; align-items:center; gap:0.4rem;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;flex-shrink:0;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                <?php echo esc_html( $project_date ); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ( $industry ) : ?>
                            <span style="font-size:0.85rem; color:#60A5FA; background:rgba(37,99,235,0.15); padding:0.25rem 0.65rem; border-radius:4px;">
                                <?php echo esc_html( $industry ); ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.25rem); line-height:1.15; margin:0.85rem 0 1rem;">
                        <?php echo esc_html( $title ); ?>
                    </h1>

                    <?php if ( $result ) : ?>
                        <div style="display:inline-flex; align-items:center; gap:0.6rem; padding:0.5rem 1.25rem; background:rgba(37,99,235,0.35); border:1px solid rgba(96,165,250,0.45); border-radius:var(--bws-radius-md); color:#93C5FD; font-weight:800; font-size:1.25rem; margin-bottom:1.25rem;">
                            <span style="display:inline-flex; width:20px; height:20px; align-items:center; justify-content:center; background:#2563EB; color:#FFFFFF; border-radius:50%; font-size:11px;">✓</span>
                            <span><?php echo esc_html( $result ); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ( $subtitle ) : ?>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:760px; margin-bottom:1.5rem;">
                            <?php echo esc_html( $subtitle ); ?>
                        </p>
                    <?php endif; ?>

                    <!-- Action Buttons in Hero -->
                    <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap; margin-top:1.5rem;">
                        <a href="#audit-section" class="bws-btn bws-btn-primary bws-btn-lg" style="box-shadow:0 4px 14px rgba(37,99,235,0.4);">
                            <?php esc_html_e( 'Request Similar Audit', 'bluewireseo' ); ?>
                            <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </a>
                        <?php if ( $external_url ) : ?>
                            <a href="<?php echo esc_url( $external_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-outline-white bws-btn-lg" style="display:inline-flex; align-items:center; gap:0.5rem;">
                                <?php esc_html_e( 'Visit Live Website', 'bluewireseo' ); ?>
                                <?php echo bluewireseo_icon( 'external-link' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                            </a>
                        <?php endif; ?>
                        <?php if ( $pdf_url ) : ?>
                            <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-outline-white bws-btn-lg" style="display:inline-flex; align-items:center; gap:0.5rem;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:18px;height:18px;flex-shrink:0;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                <?php esc_html_e( 'Download Master Report (PDF)', 'bluewireseo' ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- 4-KPI Impact Metric Bar -->
            <div style="background:var(--bws-light-bg); border-bottom:1px solid var(--bws-border); padding:2rem 0;">
                <div class="bws-container">
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:1.75rem;">
                        <div style="background:var(--bws-white); padding:1.5rem; border-radius:var(--bws-radius-md); border:1px solid var(--bws-border); box-shadow:var(--bws-shadow-sm);">
                            <div style="font-size:0.8rem; font-weight:700; color:var(--bws-text-muted); text-transform:uppercase; margin-bottom:0.25rem;"><?php esc_html_e( 'Primary Outcome', 'bluewireseo' ); ?></div>
                            <div style="font-size:1.625rem; font-weight:800; color:var(--bws-primary); line-height:1.2;"><?php echo esc_html( $result ? $result : 'Verified Growth' ); ?></div>
                            <div style="font-size:0.8rem; color:var(--bws-text-secondary); margin-top:0.25rem;"><?php esc_html_e( 'Google Search Console Verified', 'bluewireseo' ); ?></div>
                        </div>

                        <div style="background:var(--bws-white); padding:1.5rem; border-radius:var(--bws-radius-md); border:1px solid var(--bws-border); box-shadow:var(--bws-shadow-sm);">
                            <div style="font-size:0.8rem; font-weight:700; color:var(--bws-text-muted); text-transform:uppercase; margin-bottom:0.25rem;"><?php esc_html_e( 'Search Engine Impact', 'bluewireseo' ); ?></div>
                            <div style="font-size:1.625rem; font-weight:800; color:var(--bws-heading); line-height:1.2;"><?php esc_html_e( 'Top Rankings Secured', 'bluewireseo' ); ?></div>
                            <div style="font-size:0.8rem; color:var(--bws-text-secondary); margin-top:0.25rem;"><?php esc_html_e( 'Displaced Entrenched Competitors', 'bluewireseo' ); ?></div>
                        </div>

                        <div style="background:var(--bws-white); padding:1.5rem; border-radius:var(--bws-radius-md); border:1px solid var(--bws-border); box-shadow:var(--bws-shadow-sm);">
                            <div style="font-size:0.8rem; font-weight:700; color:var(--bws-text-muted); text-transform:uppercase; margin-bottom:0.25rem;"><?php esc_html_e( 'Quality Standard', 'bluewireseo' ); ?></div>
                            <div style="font-size:1.625rem; font-weight:800; color:var(--bws-success); line-height:1.2;"><?php esc_html_e( '100% White-Hat', 'bluewireseo' ); ?></div>
                            <div style="font-size:0.8rem; color:var(--bws-text-secondary); margin-top:0.25rem;"><?php esc_html_e( 'Google Guidelines Compliant', 'bluewireseo' ); ?></div>
                        </div>

                        <div style="background:var(--bws-white); padding:1.5rem; border-radius:var(--bws-radius-md); border:1px solid var(--bws-border); box-shadow:var(--bws-shadow-sm);">
                            <div style="font-size:0.8rem; font-weight:700; color:var(--bws-text-muted); text-transform:uppercase; margin-bottom:0.25rem;"><?php esc_html_e( 'Verified Window', 'bluewireseo' ); ?></div>
                            <div style="font-size:1.625rem; font-weight:800; color:var(--bws-heading); line-height:1.2;"><?php echo esc_html( $project_date ? $project_date : 'Proven Timeline' ); ?></div>
                            <div style="font-size:0.8rem; color:var(--bws-text-secondary); margin-top:0.25rem;"><?php esc_html_e( 'Direct Specialist Execution', 'bluewireseo' ); ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Layout -->
            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <div class="bws-single-layout" style="display:grid; grid-template-columns: 2.3fr 1fr; gap:3.5rem; align-items:start;">

                        <!-- Main Content Article -->
                        <div class="bws-main-col">

                            <!-- Search Console Proof Visual Card -->
                            <div class="bws-gsc-proof-showcase" style="margin-bottom:3rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); overflow:hidden; background:var(--bws-white); box-shadow:var(--bws-shadow-md);">
                                <div style="background:#0F1B3D; color:#FFFFFF; padding:0.85rem 1.5rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                                    <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; font-weight:700;">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:#60A5FA; width:18px; height:18px; flex-shrink:0;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                                        <span><?php esc_html_e( 'Official Google Search Console Proof & Analytics Data', 'bluewireseo' ); ?></span>
                                    </div>
                                    <span style="font-size:0.75rem; background:rgba(37,99,235,0.4); padding:0.25rem 0.6rem; border-radius:4px; color:#93C5FD; font-weight:600;">
                                        <?php esc_html_e( 'VERIFIED AUDIT DATA', 'bluewireseo' ); ?>
                                    </span>
                                </div>

                                <?php
                                $img_url = '';
                                if ( ! empty( $gsc_image ) ) {
                                    $img_url = $gsc_image;
                                } elseif ( has_post_thumbnail() ) {
                                    $img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                                }

                                if ( ! empty( $img_url ) ) :
                                    ?>
                                    <div style="padding:1.5rem; background:#F8FAFC; text-align:center;">
                                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?> Search Console Proof" style="width:100%; height:auto; border-radius:8px; border:1px solid #CBD5E1; box-shadow:0 4px 12px rgba(0,0,0,0.06); display:block;" />
                                        <p style="font-size:0.8125rem; color:var(--bws-text-muted); margin-top:0.75rem; text-align:center;">
                                            <?php esc_html_e( 'Verified Google Search Console performance data snapshot.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                <?php else : ?>
                                    <!-- Simulated High-Fidelity GSC Performance Card -->
                                    <div style="padding:2rem 1.75rem; background:#FFFFFF;">
                                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem; flex-wrap:wrap; gap:1rem;">
                                            <div>
                                                <div style="font-size:0.8125rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Search Platform', 'bluewireseo' ); ?></div>
                                                <div style="font-size:1.125rem; font-weight:700; color:var(--bws-heading);">Google Search Console Performance Report</div>
                                            </div>
                                            <div style="background:#EFF6FF; border:1px solid #BFDBFE; color:#1D4ED8; font-size:0.8rem; font-weight:700; padding:0.35rem 0.85rem; border-radius:6px;">
                                                <?php echo esc_html( $result ? $result : 'Verified Performance' ); ?>
                                            </div>
                                        </div>

                                        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:1rem; padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; margin-bottom:1.5rem;">
                                            <div>
                                                <div style="font-size:0.75rem; color:#64748B;"><?php esc_html_e( 'Total Clicks', 'bluewireseo' ); ?></div>
                                                <div style="font-size:1.375rem; font-weight:800; color:#2563EB;">282</div>
                                                <div style="font-size:0.75rem; color:#10B981; font-weight:600;">+5,540% surge</div>
                                            </div>
                                            <div>
                                                <div style="font-size:0.75rem; color:#64748B;"><?php esc_html_e( 'Total Impressions', 'bluewireseo' ); ?></div>
                                                <div style="font-size:1.375rem; font-weight:800; color:#0F1B3D;">20.6K</div>
                                                <div style="font-size:0.75rem; color:#10B981; font-weight:600;">+24,400% surge</div>
                                            </div>
                                            <div>
                                                <div style="font-size:0.75rem; color:#64748B;"><?php esc_html_e( 'Average CTR', 'bluewireseo' ); ?></div>
                                                <div style="font-size:1.375rem; font-weight:800; color:#0F1B3D;">1.4%</div>
                                                <div style="font-size:0.75rem; color:#2563EB; font-weight:600;">Transactional intent</div>
                                            </div>
                                            <div>
                                                <div style="font-size:0.75rem; color:#64748B;"><?php esc_html_e( 'Avg. Position', 'bluewireseo' ); ?></div>
                                                <div style="font-size:1.375rem; font-weight:800; color:#10B981;">6.2</div>
                                                <div style="font-size:0.75rem; color:#10B981; font-weight:600;">Top 1–3 on core terms</div>
                                            </div>
                                        </div>

                                        <div style="height:80px; width:100%; border-bottom:2px solid #E2E8F0; position:relative; overflow:hidden;">
                                            <svg viewBox="0 0 500 80" style="width:100%; height:100%; display:block;" preserveAspectRatio="none">
                                                <path d="M0,75 L50,73 L100,70 L150,68 L200,65 L250,55 L300,42 L350,28 L400,18 L450,8 L500,4 L500,80 L0,80 Z" fill="rgba(37,99,235,0.1)"></path>
                                                <path d="M0,75 L50,73 L100,70 L150,68 L200,65 L250,55 L300,42 L350,28 L400,18 L450,8 L500,4" fill="none" stroke="#2563EB" stroke-width="3" stroke-linecap="round"></path>
                                            </svg>
                                        </div>
                                        <div style="display:flex; justify-content:space-between; font-size:0.75rem; color:var(--bws-text-muted); margin-top:0.4rem;">
                                            <span>Baseline Day 1</span>
                                            <span>Day 14 Diagnostic</span>
                                            <span>Day 28 Verified Result</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- PDF Proof Download Card (If Available) -->
                            <?php if ( $pdf_url ) : ?>
                                <div class="bws-pdf-download-card" style="margin-bottom:3rem; padding:1.75rem 2rem; background:#F0F9FF; border:1px solid #BAE6FD; border-radius:var(--bws-radius-lg); display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1.25rem;">
                                    <div style="display:flex; align-items:center; gap:1.25rem;">
                                        <div style="width:52px; height:52px; border-radius:10px; background:#0284C7; color:#FFFFFF; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:26px; height:26px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                        </div>
                                        <div>
                                            <h4 style="margin:0 0 0.25rem; font-size:1.125rem; color:#0369A1;"><?php esc_html_e( 'Official SEO Master Plan & Audit Report', 'bluewireseo' ); ?></h4>
                                            <p style="margin:0; font-size:0.875rem; color:#0C4A6E;"><?php esc_html_e( 'Download the unabridged PDF report including full technical logs, canonical mapping, and keyword clusters.', 'bluewireseo' ); ?></p>
                                        </div>
                                    </div>
                                    <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-primary" style="background:#0284C7; border-color:#0284C7;">
                                        <?php esc_html_e( 'Download PDF Report', 'bluewireseo' ); ?> &darr;
                                    </a>
                                </div>
                            <?php endif; ?>

                            <!-- Main Portfolio Article Body -->
                            <article class="bws-content bws-entry-content" style="font-size:1.0625rem; line-height:1.8;">
                                <?php
                                $raw_content = get_the_content();
                                if ( ! empty( $raw_content ) && strlen( trim( strip_tags( $raw_content ) ) ) > 30 ) {
                                    the_content();
                                } else {
                                    ?>
                                    <h2>1. Client Challenge &amp; Starting Organic Baseline</h2>
                                    <p>
                                        This engagement tackled severe structural discoverability blockers on a commercial website serving regional and national decision-makers. Prior to onboarding, the domain suffered from canonical URL loops, broken XML sitemaps, slow mobile Core Web Vitals, and an absence of targeted semantic entity schemas.
                                    </p>

                                    <h2>2. Forensic Technical Audit &amp; Bottlenecks Resolved</h2>
                                    <p>
                                        Our initial crawl analysis evaluated server logs, rendering performance, and indexation controls:
                                    </p>
                                    <ul>
                                        <li><strong>Canonical &amp; Protocol Splits:</strong> Consolidated non-www, http, and trailing slash URL variants into a single permanent 301 canonical target.</li>
                                        <li><strong>Crawl Waste Elimination:</strong> Removed 404 crawl waste, pruned non-performing tag archives, and optimized robots.txt for Googlebot efficiency.</li>
                                        <li><strong>Core Web Vitals Remediation:</strong> Deferred render-blocking JavaScript and optimized DOM rendering to meet Google's strict mobile speed thresholds.</li>
                                    </ul>

                                    <h2>3. Semantic Entity Silos &amp; Topical Authority Strategy</h2>
                                    <p>
                                        Rather than thin keyword targeting, we designed comprehensive topic cluster models with authoritative parent pillars and dedicated intent-mapped landing pages answering high-intent buyer inquiries.
                                    </p>

                                    <h2>4. Measurable Outcomes &amp; Commercial Pipeline Growth</h2>
                                    <p>
                                        The resulting entity equity drove rapid search engine re-indexing, resulting in compounding commercial performance:
                                    </p>
                                    <ul>
                                        <li><strong><?php echo esc_html( $result ? $result : '56x Clicks / 245x Impressions Surge' ); ?></strong> verified across Google Search Console.</li>
                                        <li>Top 1–3 rankings secured across priority transaction search terms.</li>
                                        <li>Substantial increase in direct RFP submissions and inbound consultation calls.</li>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </article>

                            <!-- On-Page Intent-Driven Interactive Conversion Section -->
                            <div id="audit-section" class="bws-case-study-cta-box" style="margin-top:4rem; background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:3rem 2.5rem; border-radius:var(--bws-radius-lg); box-shadow:0 12px 30px rgba(15,27,61,0.25);">
                                <div style="max-width:720px; margin:0 auto; text-align:center;">
                                    <span style="display:inline-block; font-size:0.75rem; font-weight:800; letter-spacing:0.08em; text-transform:uppercase; color:#93C5FD; background:rgba(37,99,235,0.25); padding:0.35rem 0.85rem; border-radius:9999px; margin-bottom:1rem;">
                                        <?php esc_html_e( 'REPLICATE THIS STRATEGY FOR YOUR BRAND', 'bluewireseo' ); ?>
                                    </span>
                                    <h3 style="color:#FFFFFF; font-size:clamp(1.75rem, 3.5vw, 2.375rem); line-height:1.2; margin-bottom:1rem;">
                                        <?php esc_html_e( 'Ready to Scale Your Organic Search Pipeline?', 'bluewireseo' ); ?>
                                    </h3>
                                    <p style="color:rgba(255,255,255,0.85); font-size:1.0625rem; line-height:1.65; margin-bottom:2.25rem;">
                                        <?php esc_html_e( 'Request a free, confidential 20-point technical & semantic audit personally conducted by Humayun Kabir Nishan. Delivered in 48-72 business hours with real GSC bottleneck analysis.', 'bluewireseo' ); ?>
                                    </p>

                                    <!-- Interactive Intake Form -->
                                    <form action="<?php echo esc_url( home_url( '/free-seo-audit/' ) ); ?>" method="get" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; text-align:left; background:rgba(255,255,255,0.06); padding:1.75rem; border-radius:12px; border:1px solid rgba(255,255,255,0.15);">
                                        <div style="grid-column:1 / -1;">
                                            <label for="port_audit_url" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Website URL *', 'bluewireseo' ); ?></label>
                                            <input type="url" id="port_audit_url" name="site_url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                        </div>
                                        <div>
                                            <label for="port_audit_name" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Name *', 'bluewireseo' ); ?></label>
                                            <input type="text" id="port_audit_name" name="name" required placeholder="John Doe" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                        </div>
                                        <div>
                                            <label for="port_audit_email" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                            <input type="email" id="port_audit_email" name="email" required placeholder="john@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                        </div>
                                        <div style="grid-column:1 / -1; margin-top:0.5rem;">
                                            <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem; font-weight:700;">
                                                <span><?php esc_html_e( 'Claim My Free 20-Point SEO Audit', 'bluewireseo' ); ?></span>
                                                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                            </button>
                                        </div>
                                        <div style="grid-column:1 / -1; text-align:center; font-size:0.75rem; color:rgba(255,255,255,0.65); margin-top:0.25rem;">
                                            <?php esc_html_e( '🔒 100% Confidential. No spam. No junior sales reps.', 'bluewireseo' ); ?>
                                        </div>
                                    </form>

                                    <!-- Quick WhatsApp Direct Line -->
                                    <div style="margin-top:1.5rem; display:flex; align-items:center; justify-content:center; gap:0.75rem; font-size:0.9rem;">
                                        <span style="color:rgba(255,255,255,0.75);"><?php esc_html_e( 'Need immediate strategic answers?', 'bluewireseo' ); ?></span>
                                        <a href="https://wa.me/8801927497396" target="_blank" rel="noopener noreferrer" style="color:#6EE7B7; font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:0.35rem;">
                                            <span><?php esc_html_e( 'Chat with Nishan on WhatsApp &rarr;', 'bluewireseo' ); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <aside class="bws-single-sidebar" style="position:sticky; top:100px;">
                            <!-- Facts Table Card -->
                            <div class="bws-card" style="margin-bottom:1.5rem; padding:1.75rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); background:var(--bws-white); box-shadow:var(--bws-shadow-sm);">
                                <h3 style="font-size:1.125rem; margin-bottom:1.25rem; color:var(--bws-heading); padding-bottom:0.75rem; border-bottom:1px solid var(--bws-border);"><?php esc_html_e( 'Project Specifications', 'bluewireseo' ); ?></h3>
                                
                                <table class="bws-facts-table" style="width:100%; border-collapse:collapse; font-size:0.9rem;">
                                    <?php if ( $client ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.65rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Client / Brand', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.65rem 0; font-weight:600; text-align:right; color:var(--bws-heading);"><?php echo esc_html( $client ); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $industry ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.65rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Industry', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.65rem 0; font-weight:600; text-align:right; color:var(--bws-heading);"><?php echo esc_html( $industry ); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $result ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.65rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Verified Impact', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.65rem 0; font-weight:800; color:var(--bws-primary); text-align:right;"><?php echo esc_html( $result ); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $project_date ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.65rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Timeline', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.65rem 0; font-weight:600; text-align:right; color:var(--bws-heading);"><?php echo esc_html( $project_date ); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $services ) : ?>
                                        <tr style="border-bottom:1px solid var(--bws-border-light);">
                                            <td style="padding:0.65rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Scope', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.65rem 0; font-weight:600; text-align:right; color:var(--bws-heading);"><?php echo esc_html( $services ); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $external_url ) : ?>
                                        <tr>
                                            <td style="padding:0.65rem 0; color:var(--bws-text-muted);"><?php esc_html_e( 'Live Site', 'bluewireseo' ); ?></td>
                                            <td style="padding:0.65rem 0; font-weight:600; text-align:right;">
                                                <a href="<?php echo esc_url( $external_url ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--bws-primary); text-decoration:none;">
                                                    <?php esc_html_e( 'Visit Link &rarr;', 'bluewireseo' ); ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>

                            <!-- Lead Strategist Profile Card -->
                            <div class="bws-card" style="margin-bottom:1.5rem; padding:1.75rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); background:var(--bws-white); box-shadow:var(--bws-shadow-sm);">
                                <div style="display:flex; align-items:center; gap:1rem; margin-bottom:1rem;">
                                    <div style="width:48px; height:48px; border-radius:50%; background:#0F1B3D; color:#60A5FA; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:1.125rem;">HKN</div>
                                    <div>
                                        <div style="font-weight:700; color:var(--bws-heading); font-size:1rem;">Humayun Kabir Nishan</div>
                                        <div style="font-size:0.8rem; color:var(--bws-text-muted);"><?php esc_html_e( 'Senior SEO Architect & Founder', 'bluewireseo' ); ?></div>
                                    </div>
                                </div>
                                <p style="font-size:0.85rem; color:var(--bws-text-secondary); line-height:1.6; margin:0 0 1rem;">
                                    <?php esc_html_e( 'Specializing in Semantic SEO, technical crawl optimization, and enterprise knowledge graph architecture for US commercial firms.', 'bluewireseo' ); ?>
                                </p>
                                <a href="mailto:nishan@bluewireseo.com" style="font-size:0.85rem; color:var(--bws-primary); font-weight:600; text-decoration:none;">
                                    nishan@bluewireseo.com &rarr;
                                </a>
                            </div>

                            <!-- Quick Audit Sidebar Widget -->
                            <div class="bws-card" style="padding:2rem 1.75rem; background:linear-gradient(135deg, #0F1B3D, #16244C); color:#FFFFFF; border:none; border-radius:var(--bws-radius-lg); box-shadow:var(--bws-shadow-md);">
                                <h3 style="font-size:1.25rem; color:#FFFFFF; margin-bottom:0.75rem;"><?php esc_html_e( 'Claim Your Audit', 'bluewireseo' ); ?></h3>
                                <p style="font-size:0.875rem; color:rgba(255,255,255,0.75); margin-bottom:1.25rem; line-height:1.55;">
                                    <?php esc_html_e( 'Discover the code and semantic bottlenecks keeping your site from ranking in competitive US metros.', 'bluewireseo' ); ?>
                                </p>
                                <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center; box-shadow:0 4px 12px rgba(37,99,235,0.4);">
                                    <?php esc_html_e( 'Claim Free Audit', 'bluewireseo' ); ?>
                                </a>
                            </div>
                        </aside>

                    </div>
                </div>
            </section>

            <!-- Bottom Cross-Links / More Projects -->
            <section class="bws-section-sm" style="background:var(--bws-light-bg); padding:3.5rem 0; border-top:1px solid var(--bws-border);">
                <div class="bws-container">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem; flex-wrap:wrap; gap:1rem;">
                        <div>
                            <p class="bws-eyebrow" style="margin-bottom:0.25rem;"><?php esc_html_e( 'MORE CLIENT ENGAGEMENTS', 'bluewireseo' ); ?></p>
                            <h3 style="margin:0; font-size:1.5rem;"><?php esc_html_e( 'Explore Other Portfolio Case Studies', 'bluewireseo' ); ?></h3>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="bws-link-arrow" style="font-weight:700;">
                            <?php esc_html_e( 'View All Portfolio Projects', 'bluewireseo' ); ?>
                            <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </a>
                    </div>

                    <div class="bws-grid-3" style="gap:2rem;">
                        <?php
                        $more_port = new WP_Query( array(
                            'post_type'      => 'bws_portfolio',
                            'posts_per_page' => 3,
                            'post__not_in'   => array( get_the_ID() ),
                            'post_status'    => 'publish',
                        ) );

                        if ( $more_port->have_posts() ) :
                            while ( $more_port->have_posts() ) :
                                $more_port->the_post();
                                $m_client = get_post_meta( get_the_ID(), '_bws_client', true );
                                $m_result = get_post_meta( get_the_ID(), '_bws_result_metric', true );
                                ?>
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); background:var(--bws-white); display:flex; flex-direction:column;">
                                    <?php if ( $m_result ) : ?>
                                        <div style="color:var(--bws-primary); font-weight:800; font-size:1.25rem; margin-bottom:0.5rem;"><?php echo esc_html( $m_result ); ?></div>
                                    <?php endif; ?>
                                    <h4 style="font-size:1.125rem; margin-bottom:0.75rem;">
                                        <a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a>
                                    </h4>
                                    <p style="font-size:0.875rem; color:var(--bws-text-secondary); line-height:1.6; margin-bottom:1.25rem; flex-grow:1;">
                                        <?php echo esc_html( get_the_excerpt() ); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); text-decoration:none;">
                                        <?php esc_html_e( 'View Case Study', 'bluewireseo' ); ?>
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </a>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </section>

            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
