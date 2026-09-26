<?php
/**
 * Template Name: BlueWireSEO — Portfolio Overview
 * Template Post Type: page, post, bws_portfolio, bws_case_study, bws_service, bws_industry
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
            $custom_title = get_post_meta( get_the_ID(), '_bws_custom_hero_title', true );
            $title        = ! empty( $custom_title ) ? $custom_title : get_the_title();
            $subtitle     = get_post_meta( get_the_ID(), '_bws_hero_subtitle', true );
            $eyebrow      = get_post_meta( get_the_ID(), '_bws_hero_eyebrow', true );
            $gsc_image    = get_post_meta( get_the_ID(), '_bws_gsc_image', true );
            $pdf_url      = get_post_meta( get_the_ID(), '_bws_pdf_url', true );
            $hide_hero    = get_post_meta( get_the_ID(), '_bws_hide_hero', true );

            if ( empty( $eyebrow ) ) {
                $eyebrow = __( 'PROVEN CLIENT CAMPAIGNS', 'bluewireseo' );
            }
            if ( empty( $subtitle ) ) {
                $subtitle = __( 'Explore executed SEO roadmaps, technical remediations, and topical authority transformations engineered for high-growth commercial brands.', 'bluewireseo' );
            }

            if ( '1' !== $hide_hero ) :
                ?>
                <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem; position:relative; overflow:hidden;">
                    <div style="position:absolute; top:-80px; right:-80px; width:450px; height:450px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.2) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>
                    <div class="bws-container" style="position:relative; z-index:2;">
                        <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        <div style="max-width:800px; margin-top:1.25rem;">
                            <p class="bws-eyebrow" style="color:#93C5FD; margin-bottom:0.75rem;"><?php echo esc_html( $eyebrow ); ?></p>
                            <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin-bottom:1rem;">
                                <?php echo esc_html( $title ); ?>
                            </h1>
                            <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.88); font-size:1.125rem; line-height:1.65; margin-bottom:1.5rem;">
                                <?php echo esc_html( $subtitle ); ?>
                            </p>
                            <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
                                <a href="#portfolio-audit-intake" class="bws-btn bws-btn-primary bws-btn-lg">
                                    <?php esc_html_e( 'Request Similar Audit', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </a>
                                <?php if ( $pdf_url ) : ?>
                                    <a href="<?php echo esc_url( $pdf_url ); ?>" target="_blank" rel="noopener noreferrer" class="bws-btn bws-btn-outline-white bws-btn-lg">
                                        <?php esc_html_e( 'Download Master Plan (PDF)', 'bluewireseo' ); ?> &darr;
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
                    <?php
                    $raw_content = get_the_content();
                    if ( ! empty( $raw_content ) && stripos( $raw_content, 'This is the' ) === false && strlen( trim( strip_tags( $raw_content ) ) ) > 15 ) :
                        echo '<div class="bws-content" style="max-width:860px; margin-bottom:3rem; font-size:1.0625rem; line-height:1.75;">';
                        the_content();
                        echo '</div>';
                    endif;
                    ?>

                    <!-- Search Console Proof Visual Showcase Card on Portfolio Page -->
                    <div class="bws-gsc-proof-showcase" style="margin-bottom:3.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); overflow:hidden; background:var(--bws-white); box-shadow:var(--bws-shadow-md);">
                        <div style="background:#0F1B3D; color:#FFFFFF; padding:0.85rem 1.5rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                            <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; font-weight:700;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:#60A5FA; width:18px; height:18px; flex-shrink:0;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                                <span><?php esc_html_e( 'Official Search Console Performance Snapshot (Verified Client Portfolios)', 'bluewireseo' ); ?></span>
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
                            <div style="padding:2rem 1.75rem; background:#FFFFFF;">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem; flex-wrap:wrap; gap:1rem;">
                                    <div>
                                        <div style="font-size:0.8125rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Measurement Source', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.125rem; font-weight:700; color:var(--bws-heading);">Google Search Console Performance Report</div>
                                    </div>
                                    <div style="background:#EFF6FF; border:1px solid #BFDBFE; color:#1D4ED8; font-size:0.8rem; font-weight:700; padding:0.35rem 0.85rem; border-radius:6px;">
                                        <?php esc_html_e( 'Verified +56x Growth Spike', 'bluewireseo' ); ?>
                                    </div>
                                </div>

                                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(170px, 1fr)); gap:1rem; padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; margin-bottom:1.5rem;">
                                    <div>
                                        <div style="font-size:0.75rem; color:#64748B; font-weight:600;"><?php esc_html_e( 'Total Clicks', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.5rem; font-weight:800; color:#2563EB;">282</div>
                                        <div style="font-size:0.75rem; color:#10B981; font-weight:600;">+5,540% surge (GlobalAir)</div>
                                    </div>
                                    <div>
                                        <div style="font-size:0.75rem; color:#64748B; font-weight:600;"><?php esc_html_e( 'Total Impressions', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.5rem; font-weight:800; color:#0F1B3D;">20.6K</div>
                                        <div style="font-size:0.75rem; color:#10B981; font-weight:600;">+24,400% surge</div>
                                    </div>
                                    <div>
                                        <div style="font-size:0.75rem; color:#64748B; font-weight:600;"><?php esc_html_e( 'Metro Impressions', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.5rem; font-weight:800; color:#0F1B3D;">656,000+</div>
                                        <div style="font-size:0.75rem; color:#2563EB; font-weight:600;">OOH Billboards (8 Metros)</div>
                                    </div>
                                    <div>
                                        <div style="font-size:0.75rem; color:#64748B; font-weight:600;"><?php esc_html_e( 'Avg. Position', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1.5rem; font-weight:800; color:#10B981;">Top 1–3</div>
                                        <div style="font-size:0.75rem; color:#10B981; font-weight:600;">#1 Ad South Carolina</div>
                                    </div>
                                </div>

                                <div style="height:70px; width:100%; border-bottom:2px solid #E2E8F0; position:relative; overflow:hidden;">
                                    <svg viewBox="0 0 500 70" style="width:100%; height:100%; display:block;" preserveAspectRatio="none">
                                        <path d="M0,65 L50,63 L100,60 L150,58 L200,55 L250,45 L300,35 L350,22 L400,14 L450,6 L500,2 L500,70 L0,70 Z" fill="rgba(37,99,235,0.08)"></path>
                                        <path d="M0,65 L50,63 L100,60 L150,58 L200,55 L250,45 L300,35 L350,22 L400,14 L450,6 L500,2" fill="none" stroke="#2563EB" stroke-width="3" stroke-linecap="round"></path>
                                    </svg>
                                </div>
                                <div style="display:flex; justify-content:space-between; font-size:0.75rem; color:var(--bws-text-muted); margin-top:0.4rem;">
                                    <span>Baseline Day 1</span>
                                    <span>Day 14 Technical Remediation</span>
                                    <span>Day 28 Verified Growth Spike</span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="bws-grid-3" style="gap:2rem;">
                        <?php
                        $port_query = new WP_Query( array(
                            'post_type'      => 'bws_portfolio',
                            'posts_per_page' => 12,
                            'post_status'    => 'publish',
                        ) );

                        if ( $port_query->have_posts() ) :
                            while ( $port_query->have_posts() ) :
                                $port_query->the_post();
                                $client   = get_post_meta( get_the_ID(), '_bws_client', true );
                                $result   = get_post_meta( get_the_ID(), '_bws_result_metric', true );
                                $industry = get_post_meta( get_the_ID(), '_bws_industry', true );
                                ?>
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                                        <span class="bws-card-tag tag-ooh" style="font-size:0.75rem; margin:0;"><?php echo esc_html( $industry ? $industry : 'SEO Portfolio' ); ?></span>
                                        <?php if ( $result ) : ?>
                                            <span style="font-size:0.85rem; font-weight:700; color:var(--bws-primary);"><?php echo esc_html( $result ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">
                                        <a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a>
                                    </h3>
                                    <?php if ( $client ) : ?>
                                        <p style="font-size:0.85rem; color:var(--bws-text-muted); margin-bottom:0.75rem;">
                                            <strong><?php esc_html_e( 'Client:', 'bluewireseo' ); ?></strong> <?php echo esc_html( $client ); ?>
                                        </p>
                                    <?php endif; ?>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php the_excerpt(); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php esc_html_e( 'View Project Details', 'bluewireseo' ); ?>
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </a>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            $real_portfolio = array(
                                array(
                                    'title'    => 'GlobalAir Airport Services — Full Turnaround',
                                    'client'   => 'GlobalAir (globalair.com.bd)',
                                    'industry' => 'Airport Services',
                                    'result'   => '56x Clicks / Pos #6',
                                    'desc'     => 'Eliminated canonical split issues, built 4 comprehensive guide pillars for Hazrat Shahjalal International Airport, and scaled impressions from 84 to 20,600 in 28 days.',
                                ),
                                array(
                                    'title'    => 'Capital Outdoor Inc. — Hyperlocal OOH Billboard Architecture',
                                    'client'   => 'Capital Outdoor Inc. (capitaloutdoorinc.com)',
                                    'industry' => 'OOH Advertising',
                                    'result'   => '+18% Organic Keywords',
                                    'desc'     => 'Designed Smithfield NC, Roanoke VA, and I-95 corridor sub-location hub pages to capture 1,200+ high-intent search impressions with zero prior ranking.',
                                ),
                                array(
                                    'title'    => 'Franklin Outdoor — Minnesota & Wisconsin Billboard Strategy',
                                    'client'   => 'Franklin Outdoor (franklinoutdoor.com)',
                                    'industry' => 'Billboard Advertising',
                                    'result'   => '103K Imp. / #2 Minneapolis',
                                    'desc'     => 'Audited crawl statistics, resolved 12% 404 crawl waste, optimized mobile Core Web Vitals to 84, and deployed 3-pillar 14-cluster topical authority plan.',
                                ),
                                array(
                                    'title'    => 'BMV Service — European Auto Repair Competitor Displacement',
                                    'client'   => 'BMV Service (bmvservice.pro)',
                                    'industry' => 'Automotive / Local SEO',
                                    'result'   => 'Pos. 1-2 for BMW Repair',
                                    'desc'     => 'Constructed dedicated make-specific service pages (BMW, Mercedes, Porsche, Audi) in Gaithersburg, MD, eliminating missing H1 tags and outranking local dealers.',
                                ),
                                array(
                                    'title'    => 'OpsIQ — Operations Strategy Platform & Fractional COO SEO',
                                    'client'   => 'OpsIQ (opsiq.biz)',
                                    'industry' => 'B2B Consulting & SaaS',
                                    'result'   => '4,480 Impressions / Top 10',
                                    'desc'     => 'Targeted high-intent founder queries for fractional COO services, fixed 5 broken sitemaps, eliminated keyword cannibalization, and built conversion-focused playbooks.',
                                ),
                                array(
                                    'title'    => 'Trailhead Media — Sustained 656K Impressions Across 8 Metros',
                                    'client'   => 'Trailhead Media (trailheadmedia.com)',
                                    'industry' => 'US Billboard Advertising',
                                    'result'   => '656K Imp. / 4.39K Clicks',
                                    'desc'     => 'Built unified multi-city parent-child entity schemas across South Carolina and 8 regional markets, ranking #1 for "advertising south carolina".',
                                ),
                            );

                            foreach ( $real_portfolio as $item ) :
                                ?>
                                <article class="bws-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                                        <span class="bws-card-tag tag-ooh" style="font-size:0.75rem; margin:0;"><?php echo esc_html( $item['industry'] ); ?></span>
                                        <span style="font-size:0.85rem; font-weight:700; color:var(--bws-primary);"><?php echo esc_html( $item['result'] ); ?></span>
                                    </div>
                                    <h3 style="font-size:1.25rem; margin-bottom:0.75rem;">
                                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="color:inherit; text-decoration:none;"><?php echo esc_html( $item['title'] ); ?></a>
                                    </h3>
                                    <p style="font-size:0.85rem; color:var(--bws-text-muted); margin-bottom:0.75rem;">
                                        <strong><?php esc_html_e( 'Client:', 'bluewireseo' ); ?></strong> <?php echo esc_html( $item['client'] ); ?>
                                    </p>
                                    <p style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                        <?php echo esc_html( $item['desc'] ); ?>
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bws-link-arrow" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                        <?php esc_html_e( 'Request Case Study', 'bluewireseo' ); ?>
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </a>
                                </article>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>

                    <!-- Interactive On-Page Lead Generation Intake -->
                    <div id="portfolio-audit-intake" class="bws-portfolio-audit-box" style="margin-top:5rem; background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:3.5rem 2.5rem; border-radius:var(--bws-radius-lg); box-shadow:0 12px 30px rgba(15,27,61,0.25);">
                        <div style="text-align:center; max-width:700px; margin:0 auto 2rem;">
                            <span style="display:inline-block; font-size:0.75rem; font-weight:800; letter-spacing:0.08em; text-transform:uppercase; color:#93C5FD; background:rgba(37,99,235,0.25); padding:0.35rem 0.85rem; border-radius:9999px; margin-bottom:1rem;">
                                <?php esc_html_e( 'CONFIDENTIAL PORTFOLIO ANALYSIS', 'bluewireseo' ); ?>
                            </span>
                            <h3 style="color:#FFFFFF; font-size:clamp(1.75rem, 3.5vw, 2.375rem); line-height:1.2; margin-bottom:0.75rem;">
                                <?php esc_html_e( 'Want A Similar Campaign Engineered For Your Domain?', 'bluewireseo' ); ?>
                            </h3>
                            <p style="color:rgba(255,255,255,0.85); font-size:1.0625rem; line-height:1.65; margin:0;">
                                <?php esc_html_e( 'Request a free, confidential 20-point diagnostic personally conducted by Humayun Kabir Nishan. Delivered in 48-72 business hours with real GSC bottleneck analysis.', 'bluewireseo' ); ?>
                            </p>
                        </div>

                        <form action="<?php echo esc_url( home_url( '/free-seo-audit/' ) ); ?>" method="get" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; text-align:left; background:rgba(255,255,255,0.06); padding:2rem; border-radius:12px; border:1px solid rgba(255,255,255,0.15); max-width:820px; margin:0 auto;">
                            <div style="grid-column:1 / -1;">
                                <label for="port_audit_url" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Website URL *', 'bluewireseo' ); ?></label>
                                <input type="url" id="port_audit_url" name="site_url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                            </div>
                            <div>
                                <label for="port_audit_name" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Name *', 'bluewireseo' ); ?></label>
                                <input type="text" id="port_audit_name" name="name" required placeholder="John Doe" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                            </div>
                            <div>
                                <label for="port_audit_email" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                <input type="email" id="port_audit_email" name="email" required placeholder="john@company.com" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                            </div>
                            <div style="grid-column:1 / -1; margin-top:0.5rem;">
                                <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem; font-weight:700;">
                                    <?php esc_html_e( 'Get Free Technical SEO Audit &rarr;', 'bluewireseo' ); ?>
                                </button>
                                <p style="font-size:0.75rem; color:rgba(255,255,255,0.65); text-align:center; margin-top:0.75rem; margin-bottom:0;">
                                    <?php esc_html_e( 'Delivered in 48-72h • 100% Manual Expert Analysis • No bot spam', 'bluewireseo' ); ?>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <?php get_template_part( 'template-parts/components/cta-section' ); ?>

            <?php
            echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
            the_content();
            echo '</div>';
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
