<?php
/**
 * Single Service Template
 * BlueWireSEO — Service Template with Full Elementor Support
 *
 * @package BlueWireSEO
 */

get_header();
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
            $subtitle     = get_post_meta( get_the_ID(), '_bws_hero_subtitle', true );
            $eyebrow      = get_post_meta( get_the_ID(), '_bws_hero_eyebrow', true );
            $cat_label    = get_post_meta( get_the_ID(), '_bws_service_category_label', true );
            $cta_text     = get_post_meta( get_the_ID(), '_bws_service_cta_text', true );
            $cta_url      = get_post_meta( get_the_ID(), '_bws_service_cta_url', true );
            $gsc_image    = get_post_meta( get_the_ID(), '_bws_gsc_image', true );
            $pdf_url      = get_post_meta( get_the_ID(), '_bws_pdf_url', true );
            $hide_hero    = get_post_meta( get_the_ID(), '_bws_hide_hero', true );

            if ( empty( $eyebrow ) ) {
                $eyebrow = ! empty( $cat_label ) ? strtoupper( $cat_label ) : __( 'ENTERPRISE SEO SERVICE', 'bluewireseo' );
            }
            if ( empty( $subtitle ) ) {
                $subtitle = get_the_excerpt();
                if ( empty( $subtitle ) ) {
                    $subtitle = __( 'Engineered architectural SEO that resolves code-level indexation bottlenecks and builds compounding organic entity authority.', 'bluewireseo' );
                }
            }
            if ( empty( $cta_text ) ) {
                $cta_text = __( 'Get Free Audit', 'bluewireseo' );
            }
            if ( empty( $cta_url ) ) {
                $cta_url = bluewireseo_get_audit_url();
            }

            if ( '1' !== $hide_hero ) :
                ?>
                <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem; position:relative; overflow:hidden;">
                    <div style="position:absolute; top:-80px; right:-80px; width:450px; height:450px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.2) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>
                    <div class="bws-container" style="position:relative; z-index:2;">
                        <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        <div style="max-width:820px; margin-top:1.25rem;">
                            <span class="bws-card-tag" style="background:rgba(37,99,235,0.25); color:#93C5FD; border:1px solid rgba(147,197,253,0.3); font-size:0.75rem; padding:0.3rem 0.75rem; font-weight:700;">
                                <?php echo esc_html( $eyebrow ); ?>
                            </span>
                            <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin:0.85rem 0 1rem;">
                                <?php echo esc_html( $title ); ?>
                            </h1>
                            <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65; max-width:740px; margin-bottom:1.5rem;">
                                <?php echo esc_html( $subtitle ); ?>
                            </p>
                            <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
                                <a href="#service-lead-intake" class="bws-btn bws-btn-primary bws-btn-lg">
                                    <?php esc_html_e( 'Request Free 20-Point Audit', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </a>
                                <?php if ( ! empty( $pdf_url ) ) : ?>
                                    <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-outline-white bws-btn-lg">
                                        <?php esc_html_e( 'Download Deliverables & Proof (PDF)', 'bluewireseo' ); ?> &darr;
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            ?>

            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <div class="bws-single-layout" style="display:grid; grid-template-columns: 2.2fr 1fr; gap:3.5rem; align-items:start;">
                        <div>
                            <!-- Google Search Console Verified Proof Showcase -->
                            <div class="bws-gsc-proof-showcase" style="margin-bottom:3rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); overflow:hidden; background:var(--bws-white); box-shadow:var(--bws-shadow-md);">
                                <div style="background:#0F1B3D; color:#FFFFFF; padding:0.85rem 1.5rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                                    <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; font-weight:700;">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:#60A5FA; width:18px; height:18px; flex-shrink:0;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                                        <span><?php printf( esc_html__( 'Google Search Console Proof & Benchmark: %s', 'bluewireseo' ), esc_html( $title ) ); ?></span>
                                    </div>
                                    <span style="font-size:0.75rem; background:rgba(37,99,235,0.4); padding:0.25rem 0.6rem; border-radius:4px; color:#93C5FD; font-weight:600;">
                                        <?php esc_html_e( 'VERIFIED DATA SNAPSHOT', 'bluewireseo' ); ?>
                                    </span>
                                </div>

                                <?php if ( ! empty( $gsc_image ) ) : ?>
                                    <div style="padding:1.5rem; background:#F8FAFC; text-align:center;">
                                        <img src="<?php echo esc_url( $gsc_image ); ?>" alt="<?php echo esc_attr( $title ); ?> Search Console Proof" style="width:100%; height:auto; border-radius:8px; border:1px solid #CBD5E1; box-shadow:0 4px 12px rgba(0,0,0,0.06); display:block;" />
                                    </div>
                                <?php else : ?>
                                    <div style="padding:1.75rem; background:#FFFFFF;">
                                        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:1rem; margin-bottom:1.25rem;">
                                            <div style="padding:1rem; background:#EFF6FF; border:1px solid #BFDBFE; border-radius:8px; text-align:center;">
                                                <div style="font-size:0.75rem; color:#1E40AF; font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Crawl Efficiency', 'bluewireseo' ); ?></div>
                                                <div style="font-size:1.5rem; font-weight:800; color:#2563EB; margin-top:0.25rem;">100%</div>
                                                <div style="font-size:0.7rem; color:#64748B;"><?php esc_html_e( 'Zero Bottlenecks', 'bluewireseo' ); ?></div>
                                            </div>
                                            <div style="padding:1rem; background:#F0FDF4; border:1px solid #BBF7D0; border-radius:8px; text-align:center;">
                                                <div style="font-size:0.75rem; color:#166534; font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Average GSC Lift', 'bluewireseo' ); ?></div>
                                                <div style="font-size:1.5rem; font-weight:800; color:#10B981; margin-top:0.25rem;">+284%</div>
                                                <div style="font-size:0.7rem; color:#64748B;"><?php esc_html_e( 'Within 6–9 Months', 'bluewireseo' ); ?></div>
                                            </div>
                                            <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; text-align:center;">
                                                <div style="font-size:0.75rem; color:#334155; font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Entity Graph', 'bluewireseo' ); ?></div>
                                                <div style="font-size:1.5rem; font-weight:800; color:#0F1B3D; margin-top:0.25rem;">Schema 100%</div>
                                                <div style="font-size:0.7rem; color:#64748B;"><?php esc_html_e( 'Google Knowledge Graph', 'bluewireseo' ); ?></div>
                                            </div>
                                        </div>
                                        <p style="font-size:0.875rem; color:#64748B; line-height:1.6; margin:0;">
                                            <?php esc_html_e( 'Every campaign executed under this service framework is benchmarked directly inside Google Search Console and GA4 with weekly crawl telemetry to ensure non-volatile ranking gains.', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>

                                <?php if ( ! empty( $pdf_url ) ) : ?>
                                    <div style="padding:1rem 1.5rem; background:#F1F5F9; border-top:1px solid #E2E8F0; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.75rem;">
                                        <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; color:#1E293B; font-weight:600;">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#DC2626" stroke-width="2" style="width:20px;height:20px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                            <span><?php esc_html_e( 'Verified Service Scope & Deliverables Documentation (PDF)', 'bluewireseo' ); ?></span>
                                        </div>
                                        <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-sm bws-btn-primary" style="padding:0.4rem 0.9rem; font-size:0.8125rem;">
                                            <?php esc_html_e( 'Download Master PDF', 'bluewireseo' ); ?> &darr;
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <article class="bws-content" style="font-size:1.0625rem; line-height:1.75; margin-bottom:3rem;">
                                <?php
                                $raw_content = get_the_content();
                                if ( ! empty( $raw_content ) && strlen( trim( strip_tags( $raw_content ) ) ) > 20 ) {
                                    the_content();
                                } else {
                                    ?>
                                    <div style="margin-bottom:2.5rem;">
                                        <h2 style="font-size:1.75rem; color:var(--bws-heading); margin-bottom:1rem;"><?php printf( esc_html__( 'How %s Solves Commercial Search Growth', 'bluewireseo' ), esc_html( $title ) ); ?></h2>
                                        <p style="color:var(--bws-text-secondary); line-height:1.7; margin-bottom:1.5rem;">
                                            <?php esc_html_e( 'Most SEO agencies focus on vanity metrics like impressions and non-commercial keywords. BlueWireSEO focuses exclusively on high-intent commercial search queries, topical entity architecture, and eliminating crawl bottlenecks so your website converts organic search traffic into qualified, paying enterprise clients.', 'bluewireseo' ); ?>
                                        </p>
                                        
                                        <h3 style="font-size:1.375rem; color:var(--bws-heading); margin:2rem 0 1rem;"><?php esc_html_e( 'What We Engineer & Deliver:', 'bluewireseo' ); ?></h3>
                                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:2rem;">
                                            <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                                <div style="font-weight:700; color:#0F1B3D; margin-bottom:0.35rem; display:flex; align-items:center; gap:0.4rem;">
                                                    <span style="color:#2563EB;">✓</span> <?php esc_html_e( 'Forensic Crawl Audit', 'bluewireseo' ); ?>
                                                </div>
                                                <p style="font-size:0.875rem; color:#64748B; margin:0; line-height:1.5;"><?php esc_html_e( 'Eliminate silent crawl traps, canonical discrepancies, index bloat, and DOM rendering issues.', 'bluewireseo' ); ?></p>
                                            </div>
                                            <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                                <div style="font-weight:700; color:#0F1B3D; margin-bottom:0.35rem; display:flex; align-items:center; gap:0.4rem;">
                                                    <span style="color:#2563EB;">✓</span> <?php esc_html_e( 'Intent-Mapped Content Architecture', 'bluewireseo' ); ?>
                                                </div>
                                                <p style="font-size:0.875rem; color:#64748B; margin:0; line-height:1.5;"><?php esc_html_e( 'Content mapped directly to commercial buyer search stages, eliminating keyword cannibalization.', 'bluewireseo' ); ?></p>
                                            </div>
                                            <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                                <div style="font-weight:700; color:#0F1B3D; margin-bottom:0.35rem; display:flex; align-items:center; gap:0.4rem;">
                                                    <span style="color:#2563EB;">✓</span> <?php esc_html_e( 'Google Knowledge Graph Schema', 'bluewireseo' ); ?>
                                                </div>
                                                <p style="font-size:0.875rem; color:#64748B; margin:0; line-height:1.5;"><?php esc_html_e( 'Enterprise JSON-LD entities establishing topical authority for Google search algorithms and LLMs.', 'bluewireseo' ); ?></p>
                                            </div>
                                            <div style="padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                                <div style="font-weight:700; color:#0F1B3D; margin-bottom:0.35rem; display:flex; align-items:center; gap:0.4rem;">
                                                    <span style="color:#2563EB;">✓</span> <?php esc_html_e( 'Active GSC Performance Monitoring', 'bluewireseo' ); ?>
                                                </div>
                                                <p style="font-size:0.875rem; color:#64748B; margin:0; line-height:1.5;"><?php esc_html_e( 'Weekly index status and ranking protection to preserve position #1 captures against competitor movements.', 'bluewireseo' ); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </article>

                            <!-- Intent-Matched Interactive Audit Form on Every Service Page -->
                            <div id="service-lead-intake" class="bws-service-intake" style="background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:2.75rem 2.25rem; border-radius:var(--bws-radius-lg); box-shadow:0 10px 25px rgba(15,27,61,0.2);">
                                <div style="max-width:650px; margin-bottom:1.5rem;">
                                    <span style="font-size:0.75rem; font-weight:800; letter-spacing:0.08em; text-transform:uppercase; color:#93C5FD; background:rgba(37,99,235,0.25); padding:0.3rem 0.75rem; border-radius:9999px; display:inline-block; margin-bottom:0.75rem;">
                                        <?php printf( esc_html__( 'INTERACTIVE AUDIT FOR %s', 'bluewireseo' ), esc_html( strtoupper( $title ) ) ); ?>
                                    </span>
                                    <h3 style="color:#FFFFFF; font-size:1.625rem; margin-bottom:0.5rem; line-height:1.25;">
                                        <?php esc_html_e( 'Request A Forensic Architectural Audit', 'bluewireseo' ); ?>
                                    </h3>
                                    <p style="color:rgba(255,255,255,0.8); font-size:0.95rem; line-height:1.6; margin:0;">
                                        <?php printf( esc_html__( 'Discover exactly what crawl traps and keyword cannibalization issues are holding your website back in %s.', 'bluewireseo' ), esc_html( $title ) ); ?>
                                    </p>
                                </div>

                                <form action="<?php echo esc_url( home_url( '/free-seo-audit/' ) ); ?>" method="get" style="display:grid; grid-template-columns:1fr 1fr; gap:0.9rem; text-align:left;">
                                    <input type="hidden" name="service" value="<?php echo esc_attr( $title ); ?>" />
                                    <div style="grid-column:1 / -1;">
                                        <label for="srv_site_url" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.3rem;"><?php esc_html_e( 'Your Website URL *', 'bluewireseo' ); ?></label>
                                        <input type="url" id="srv_site_url" name="site_url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                    </div>
                                    <div>
                                        <label for="srv_client_name" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.3rem;"><?php esc_html_e( 'Your Name *', 'bluewireseo' ); ?></label>
                                        <input type="text" id="srv_client_name" name="name" required placeholder="John Doe" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                    </div>
                                    <div>
                                        <label for="srv_client_email" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.3rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                        <input type="email" id="srv_client_email" name="email" required placeholder="john@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                                    </div>
                                    <div style="grid-column:1 / -1; margin-top:0.35rem;">
                                        <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem; font-weight:700;">
                                            <?php esc_html_e( 'Request Free 20-Point Service Audit &rarr;', 'bluewireseo' ); ?>
                                        </button>
                                        <p style="font-size:0.75rem; color:rgba(255,255,255,0.65); text-align:center; margin-top:0.6rem; margin-bottom:0;">
                                            <?php esc_html_e( 'Delivered in 48-72 business hours • 100% Manual Expert Analysis • No Sales Spam', 'bluewireseo' ); ?>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Sticky Sidebar -->
                        <aside class="bws-single-sidebar" style="position:sticky; top:100px;">
                            <div class="bws-card" style="padding:2rem 1.75rem; background:linear-gradient(135deg,#0F1B3D,#16244C); color:#FFFFFF; border:none; margin-bottom:1.5rem; border-radius:var(--bws-radius-lg); box-shadow:0 8px 20px rgba(15,27,61,0.18);">
                                <div style="width:40px; height:40px; background:rgba(37,99,235,0.3); border-radius:8px; display:flex; align-items:center; justify-content:center; color:#93C5FD; margin-bottom:1.25rem;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                </div>
                                <h3 style="font-size:1.25rem; color:#FFFFFF; margin-bottom:0.75rem;"><?php esc_html_e( 'Architectural SEO Diagnostic', 'bluewireseo' ); ?></h3>
                                <p style="font-size:0.9rem; color:rgba(255,255,255,0.8); margin-bottom:1.5rem; line-height:1.6;">
                                    <?php esc_html_e( 'Get an expert 20-point diagnostic on how to optimize this service area for your commercial business.', 'bluewireseo' ); ?>
                                </p>
                                <a href="<?php echo esc_url( $cta_url ); ?>" class="bws-btn bws-btn-primary" style="width:100%; justify-content:center; margin-bottom:0.75rem;">
                                    <?php echo esc_html( $cta_text ); ?>
                                </a>
                                <?php if ( ! empty( $pdf_url ) ) : ?>
                                    <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-outline-white" style="width:100%; justify-content:center; font-size:0.85rem;">
                                        <?php esc_html_e( 'Service Scope (PDF)', 'bluewireseo' ); ?> &darr;
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="bws-card" style="padding:1.75rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:var(--bws-radius-lg);">
                                <h4 style="font-size:1rem; color:#0F1B3D; margin-bottom:0.75rem; font-weight:700;"><?php esc_html_e( 'Why BlueWireSEO?', 'bluewireseo' ); ?></h4>
                                <ul style="list-style:none; padding:0; margin:0; font-size:0.875rem; color:#475569; display:flex; flex-direction:column; gap:0.6rem;">
                                    <li style="display:flex; align-items:flex-start; gap:0.5rem;">
                                        <span style="color:#2563EB; font-weight:700;">✓</span>
                                        <span><?php esc_html_e( 'Zero automated AI superficial text', 'bluewireseo' ); ?></span>
                                    </li>
                                    <li style="display:flex; align-items:flex-start; gap:0.5rem;">
                                        <span style="color:#2563EB; font-weight:700;">✓</span>
                                        <span><?php esc_html_e( 'Verified Google Search Console proof', 'bluewireseo' ); ?></span>
                                    </li>
                                    <li style="display:flex; align-items:flex-start; gap:0.5rem;">
                                        <span style="color:#2563EB; font-weight:700;">✓</span>
                                        <span><?php esc_html_e( 'Topical graph & entity alignment', 'bluewireseo' ); ?></span>
                                    </li>
                                    <li style="display:flex; align-items:flex-start; gap:0.5rem;">
                                        <span style="color:#2563EB; font-weight:700;">✓</span>
                                        <span><?php esc_html_e( '48-72h manual turnaround', 'bluewireseo' ); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>

            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
