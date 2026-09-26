<?php
/**
 * Case Studies Archive Template
 * BlueWireSEO — High-Converting Case Studies Archive & Verified Proof
 *
 * @package BlueWireSEO
 */

get_header();

$audit_url   = bluewireseo_get_audit_url();
$contact_url = bluewireseo_get_contact_url();
?>

<main id="primary-content" class="bws-main" role="main">

    <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem; position:relative; overflow:hidden;">
        <div style="position:absolute; top:-80px; right:-80px; width:450px; height:450px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.2) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>
        <div class="bws-container" style="position:relative; z-index:2;">
            <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            <div style="max-width:800px; margin-top:1.25rem;">
                <p class="bws-eyebrow" style="color:#93C5FD; margin-bottom:0.75rem;"><?php esc_html_e( 'VERIFIED REAL RESULTS', 'bluewireseo' ); ?></p>
                <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem,4.5vw,3.5rem); line-height:1.15; margin-bottom:1rem;">
                    <?php esc_html_e( 'Results We Show You The Proof For', 'bluewireseo' ); ?>
                </h1>
                <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.88); font-size:1.125rem; line-height:1.65; margin-bottom:1.5rem;">
                    <?php esc_html_e( 'No invented numbers. Every metric in these case studies is cited with live Google Search Console timestamps, GA4 analytics, and verified client deliverables.', 'bluewireseo' ); ?>
                </p>
                <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
                    <a href="#archive-cs-audit" class="bws-btn bws-btn-primary bws-btn-lg">
                        <?php esc_html_e( 'Request Similar Audit', 'bluewireseo' ); ?>
                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </a>
                    <a href="<?php echo esc_url( $contact_url ); ?>" class="bws-btn bws-btn-outline-white bws-btn-lg">
                        <?php esc_html_e( 'Request PDF Master Plans', 'bluewireseo' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
        <div class="bws-container">

            <!-- Search Console Proof Visual Showcase Card -->
            <div class="bws-gsc-proof-showcase" style="margin-bottom:3.5rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); overflow:hidden; background:var(--bws-white); box-shadow:var(--bws-shadow-md);">
                <div style="background:#0F1B3D; color:#FFFFFF; padding:0.85rem 1.5rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                    <div style="display:flex; align-items:center; gap:0.5rem; font-size:0.875rem; font-weight:700;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:#60A5FA; width:18px; height:18px; flex-shrink:0;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                        <span><?php esc_html_e( 'Google Search Console Official Proof Snapshot', 'bluewireseo' ); ?></span>
                    </div>
                    <span style="font-size:0.75rem; background:rgba(37,99,235,0.4); padding:0.25rem 0.6rem; border-radius:4px; color:#93C5FD; font-weight:600;">
                        <?php esc_html_e( 'VERIFIED GSC DATA (28-DAY TO 12-MO WINDOWS)', 'bluewireseo' ); ?>
                    </span>
                </div>

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
            </div>

            <!-- Filter Bar -->
            <div class="bws-filter-bar" style="margin-bottom:2rem;">
                <button class="bws-filter-btn active" data-filter="all"><?php esc_html_e( 'All Case Studies', 'bluewireseo' ); ?></button>
                <?php
                $terms = get_terms( array( 'taxonomy' => 'bws_case_category', 'hide_empty' => true ) );
                if ( $terms && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        printf(
                            '<button class="bws-filter-btn" data-filter="%s">%s</button>',
                            esc_attr( $term->slug ),
                            esc_html( $term->name )
                        );
                    }
                }
                ?>
            </div>

            <div class="bws-grid-3" id="bws-case-grid" style="gap:2rem;">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        echo bluewireseo_case_study_card( get_the_ID() ); // phpcs:ignore WordPress.Security.EscapeOutput
                    endwhile;
                else :
                    // Fallback to real Nishan case study campaigns if posts were deleted from backend
                    $real_case_studies = array(
                        array(
                            'title'    => 'GlobalAir Airport Services — 56x Click Surge in 28 Days',
                            'client'   => 'GlobalAir (globalair.com.bd)',
                            'ind'      => 'Airport Assistance Services',
                            'result'   => '56x Clicks / 245x Impressions',
                            'metric'   => '5 &rarr; 282 Clicks in 28 Days',
                            'source'   => 'Google Search Console (28-Day Window)',
                            'desc'     => 'Rebuilt a zero-visibility airport VIP assistance website in Dhaka. Fixed HTTP/HTTPS/WWW canonical splits, deployed targeted meta tags, and built 4 long-form airport guide clusters.',
                            'url'      => '/case-studies/globalair-seo-turnaround/',
                        ),
                        array(
                            'title'    => 'Capital Outdoor Inc. — Hyperlocal OOH Billboard Architecture',
                            'client'   => 'Capital Outdoor Inc. (capitaloutdoorinc.com)',
                            'ind'      => 'US OOH Advertising (NC & VA)',
                            'result'   => '+18% Organic Keywords / 8 AI Mentions',
                            'metric'   => '747 Imp. Smithfield / 467 Imp. Roanoke',
                            'source'   => 'GSC Crawl & Query Diagnostic',
                            'desc'     => 'Identified 747 high-intent zero-click impressions for Smithfield and 467 for Roanoke. Engineered localized county hub pages, fixed art spec redirect chains, and captured AI Overviews.',
                            'url'      => '/case-studies/capital-outdoor-seo/',
                        ),
                        array(
                            'title'    => 'Franklin Outdoor Advertising — Multi-State Billboard Domination',
                            'client'   => 'Franklin Outdoor (franklinoutdoor.com)',
                            'ind'      => 'Billboard Advertising (MN & WI)',
                            'result'   => '#2 Minneapolis / #6 Wisconsin',
                            'metric'   => '593 Clicks / 103K Impressions',
                            'source'   => 'GSC + Mobile PageSpeed Audit',
                            'desc'     => 'Fixed sitemap fetch errors, eliminated 12% 404 crawl waste, improved mobile speed from 59 to 84, and deployed a 3-pillar, 14-cluster topical roadmap dominating Minnesota and Wisconsin.',
                            'url'      => '/case-studies/franklin-outdoor-billboards/',
                        ),
                        array(
                            'title'    => 'BMV Service — European Auto Repair Competitor Displacement',
                            'client'   => 'BMV Service (bmvservice.pro)',
                            'ind'      => 'European Auto Repair (Gaithersburg, MD)',
                            'result'   => 'Pos. 1-2 for BMW Repair',
                            'metric'   => '280 Clicks / 10K Impressions (Pos 11.3 &rarr; Top 3)',
                            'source'   => 'Google Search Console & Local Schema',
                            'desc'     => 'Restructured per-make service pages (BMW, Mercedes, Porsche, Audi), resolved missing H1 tags on 3 core pages, injected LocalBusiness and AutoRepair schema to outrank local dealerships.',
                            'url'      => '/case-studies/bmvservice-auto-repair/',
                        ),
                        array(
                            'title'    => 'OpsIQ — Operations Strategy Platform & Fractional COO SEO',
                            'client'   => 'OpsIQ (opsiq.biz)',
                            'ind'      => 'Operations Strategy & B2B SaaS',
                            'result'   => '4,480 Impressions / Page-1 Capture',
                            'metric'   => '64 Clicks / 1.4% CTR (Top of Page 2)',
                            'source'   => 'Semrush Snapshot + GSC Query Data',
                            'desc'     => 'Built high-converting commercial landing pages for fractional COO services, fixed 5 broken sitemaps, eliminated keyword cannibalization, and launched a 47-point operational readiness lead magnet.',
                            'url'      => '/case-studies/opsiq-fractional-coo-seo/',
                        ),
                        array(
                            'title'    => 'Trailhead Media — Sustained 656K Impressions Across 8 Metros',
                            'client'   => 'Trailhead Media (trailheadmedia.com)',
                            'ind'      => 'US Billboard Advertising',
                            'result'   => '656K Impressions / 4.39K Clicks',
                            'metric'   => '#1 Advertising South Carolina',
                            'source'   => '12-Month GSC Performance Window',
                            'desc'     => 'Resolved keyword cannibalization across 8+ regional location pages and built a 6-pillar/24-cluster content model resulting in #1 ranking for "advertising south carolina" and 49 AI mentions.',
                            'url'      => '/case-studies/trailhead-media-billboard-seo/',
                        ),
                    );

                    foreach ( $real_case_studies as $cs ) :
                        ?>
                        <article class="bws-case-card" style="border:1px solid var(--bws-border); padding:2rem; border-radius:var(--bws-radius-lg); display:flex; flex-direction:column; background:var(--bws-white);">
                            <div class="bws-case-card-tags" style="display:flex; gap:0.5rem; margin-bottom:1rem; flex-wrap:wrap;">
                                <span class="bws-card-tag tag-ooh" style="font-size:0.75rem;"><?php echo esc_html( $cs['ind'] ); ?></span>
                            </div>
                            <h3 class="bws-case-card-title" style="font-size:1.375rem; color:var(--bws-primary); font-weight:800; margin-bottom:0.25rem;">
                                <?php echo esc_html( $cs['result'] ); ?>
                            </h3>
                            <p class="bws-case-card-subtitle" style="font-weight:700; color:var(--bws-heading); margin-bottom:0.75rem;">
                                <?php echo esc_html( $cs['title'] ); ?>
                            </p>
                            <p class="bws-case-card-desc" style="font-size:0.9375rem; color:var(--bws-text-secondary); line-height:1.65; margin-bottom:1.5rem; flex-grow:1;">
                                <?php echo esc_html( $cs['desc'] ); ?>
                            </p>
                            <div class="bws-case-card-source" style="font-size:0.8rem; color:var(--bws-text-muted); display:flex; align-items:center; gap:0.4rem; margin-bottom:1.25rem;">
                                <?php echo bluewireseo_icon( 'external-link' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                <span><?php echo esc_html( $cs['source'] ); ?></span>
                            </div>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bws-case-card-cta" style="font-weight:600; color:var(--bws-primary); display:inline-flex; align-items:center; gap:0.4rem; text-decoration:none;">
                                <?php esc_html_e( 'Request Detailed PDF Case Study', 'bluewireseo' ); ?>
                                <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                            </a>
                        </article>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>

            <!-- Interactive On-Page Lead Generation Intake -->
            <div id="archive-cs-audit" class="bws-case-audit-box" style="margin-top:5rem; background:linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding:3.5rem 2.5rem; border-radius:var(--bws-radius-lg); box-shadow:0 12px 30px rgba(15,27,61,0.25);">
                <div style="text-align:center; max-width:700px; margin:0 auto 2rem;">
                    <span style="display:inline-block; font-size:0.75rem; font-weight:800; letter-spacing:0.08em; text-transform:uppercase; color:#93C5FD; background:rgba(37,99,235,0.25); padding:0.35rem 0.85rem; border-radius:9999px; margin-bottom:1rem;">
                        <?php esc_html_e( 'REPLICATE VERIFIED METRIC GROWTH', 'bluewireseo' ); ?>
                    </span>
                    <h3 style="color:#FFFFFF; font-size:clamp(1.75rem, 3.5vw, 2.375rem); line-height:1.2; margin-bottom:0.75rem;">
                        <?php esc_html_e( 'Want These Growth Results For Your Website?', 'bluewireseo' ); ?>
                    </h3>
                    <p style="color:rgba(255,255,255,0.85); font-size:1.0625rem; line-height:1.65; margin:0;">
                        <?php esc_html_e( 'Request a free, confidential 20-point diagnostic personally conducted by Humayun Kabir Nishan. Delivered in 48-72 business hours with real GSC bottleneck analysis.', 'bluewireseo' ); ?>
                    </p>
                </div>

                <form action="<?php echo esc_url( home_url( '/free-seo-audit/' ) ); ?>" method="get" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; text-align:left; background:rgba(255,255,255,0.06); padding:2rem; border-radius:12px; border:1px solid rgba(255,255,255,0.15); max-width:820px; margin:0 auto;">
                    <div style="grid-column:1 / -1;">
                        <label for="acs_audit_url" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Website URL *', 'bluewireseo' ); ?></label>
                        <input type="url" id="acs_audit_url" name="site_url" required placeholder="https://yourcompany.com" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                    </div>
                    <div>
                        <label for="acs_audit_name" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Your Name *', 'bluewireseo' ); ?></label>
                        <input type="text" id="acs_audit_name" name="name" required placeholder="John Doe" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                    </div>
                    <div>
                        <label for="acs_audit_email" style="display:block; font-size:0.8125rem; font-weight:600; color:rgba(255,255,255,0.9); margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                        <input type="email" id="acs_audit_email" name="email" required placeholder="john@company.com" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(255,255,255,0.25); border-radius:6px; background:#FFFFFF; color:#0F1B3D; font-size:0.9375rem;" />
                    </div>
                    <div style="grid-column:1 / -1; margin-top:0.5rem;">
                        <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem; font-weight:700;">
                            <?php esc_html_e( 'Request Free 20-Point Turnaround Audit &rarr;', 'bluewireseo' ); ?>
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
</main>

<?php get_footer(); ?>
