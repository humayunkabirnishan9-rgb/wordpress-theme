<?php
/**
 * Template Name: BlueWireSEO — Process Page Template
 * Template Post Type: page, post, bws_portfolio, bws_case_study, bws_service, bws_industry
 *
 * @package BlueWireSEO
 */

get_header();

$audit_url   = bluewireseo_get_audit_url();
$call_url    = bluewireseo_get_call_url();
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
            ?>
            <!-- Process Hero Section -->
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 5rem 0 4rem; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-100px; right:-100px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(37,99,235,0.2) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>
                <div style="position:absolute; bottom:-60px; left:5%; width:380px; height:380px; border-radius:50%; background:radial-gradient(circle, rgba(96,165,250,0.12) 0%, rgba(15,27,61,0) 70%); pointer-events:none;"></div>

                <div class="bws-container" style="position:relative; z-index:2;">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:820px; margin-top:1.5rem;">
                        <div style="display:inline-flex; align-items:center; gap:0.5rem; background:rgba(37,99,235,0.2); border:1px solid rgba(96,165,250,0.35); padding:0.35rem 0.85rem; border-radius:9999px; margin-bottom:1.25rem;">
                            <span style="width:8px; height:8px; border-radius:50%; background:#60A5FA; display:inline-block;"></span>
                            <span class="bws-eyebrow" style="color:#93C5FD; margin:0; font-size:0.8125rem;"><?php esc_html_e( 'AGILE 90-DAY TECHNICAL SPRINT FRAMEWORK', 'bluewireseo' ); ?></span>
                        </div>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.4rem, 5vw, 3.8rem); line-height:1.15; margin-bottom:1.25rem; letter-spacing:-0.03em;">
                            <?php esc_html_e( 'How we engineer predictable organic revenue for commercial enterprises.', 'bluewireseo' ); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:clamp(1.0625rem, 2vw, 1.25rem); line-height:1.65; max-width:720px; margin-bottom:2rem;">
                            <?php esc_html_e( 'No mystery retainers or vanity traffic graphs. We deploy a disciplined 5-phase engineering methodology that eliminates code bottlenecks, models semantic entity graphs, and captures high-intent buyer searches.', 'bluewireseo' ); ?>
                        </p>
                        <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
                            <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-btn bws-btn-primary bws-btn-lg">
                                <?php esc_html_e( 'Request 20-Point Process Audit', 'bluewireseo' ); ?> &rarr;
                            </a>
                            <a href="<?php echo esc_url( $call_url ); ?>" class="bws-btn bws-btn-outline-white bws-btn-lg">
                                <?php esc_html_e( 'Book Strategic Architecture Call', 'bluewireseo' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Methodology Highlights / Quick Bar -->
            <div style="background:#0B132B; border-bottom:1px solid rgba(255,255,255,0.1); color:#FFFFFF; padding:1.5rem 0;">
                <div class="bws-container">
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:1.75rem; align-items:center;">
                        <div style="display:flex; align-items:center; gap:0.85rem;">
                            <div style="width:40px; height:40px; border-radius:8px; background:rgba(37,99,235,0.25); display:flex; align-items:center; justify-content:center; color:#60A5FA; flex-shrink:0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                            </div>
                            <div>
                                <div style="font-weight:700; font-size:0.95rem; color:#FFFFFF;">Weekly Telemetry</div>
                                <div style="font-size:0.8rem; color:rgba(255,255,255,0.6);">GSC &amp; GA4 Verified Logs</div>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:0.85rem;">
                            <div style="width:40px; height:40px; border-radius:8px; background:rgba(37,99,235,0.25); display:flex; align-items:center; justify-content:center; color:#60A5FA; flex-shrink:0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            </div>
                            <div>
                                <div style="font-weight:700; font-size:0.95rem; color:#FFFFFF;">90-Day Sprints</div>
                                <div style="font-size:0.8rem; color:rgba(255,255,255,0.6);">Measurable Milestones</div>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:0.85rem;">
                            <div style="width:40px; height:40px; border-radius:8px; background:rgba(37,99,235,0.25); display:flex; align-items:center; justify-content:center; color:#60A5FA; flex-shrink:0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7.5" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                            </div>
                            <div>
                                <div style="font-weight:700; font-size:0.95rem; color:#FFFFFF;">Direct Senior Architect</div>
                                <div style="font-size:0.8rem; color:rgba(255,255,255,0.6);">Lead by Humayun Kabir Nishan</div>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:0.85rem;">
                            <div style="width:40px; height:40px; border-radius:8px; background:rgba(37,99,235,0.25); display:flex; align-items:center; justify-content:center; color:#60A5FA; flex-shrink:0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                            </div>
                            <div>
                                <div style="font-weight:700; font-size:0.95rem; color:#FFFFFF;">100% White-Hat</div>
                                <div style="font-size:0.8rem; color:rgba(255,255,255,0.6);">Google &amp; AI Overview Compliant</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5-Phase Technical Roadmap Section -->
            <section class="bws-section" style="background:#F8FAFC; padding:5rem 0;">
                <div class="bws-container">
                    <div style="text-align:center; max-width:760px; margin:0 auto 4rem;">
                        <span class="bws-card-tag" style="background:#EFF6FF; color:#2563EB; border:1px solid #BFDBFE; font-size:0.8125rem; font-weight:700; padding:0.35rem 0.85rem;">
                            <?php esc_html_e( 'THE BLUEWIRESEO 5-PHASE ARCHITECTURE', 'bluewireseo' ); ?>
                        </span>
                        <h2 style="font-size:clamp(2rem, 4vw, 2.75rem); color:var(--bws-heading); margin:1rem 0 0.75rem; letter-spacing:-0.02em;">
                            <?php esc_html_e( 'Disciplined execution from crawl log to commercial conversion.', 'bluewireseo' ); ?>
                        </h2>
                        <p style="color:var(--bws-text-secondary); font-size:1.1rem; line-height:1.65; margin:0;">
                            <?php esc_html_e( 'Every phase is backed by hard deliverables, senior code reviews, and weekly crawl verification to ensure sustainable search visibility.', 'bluewireseo' ); ?>
                        </p>
                    </div>

                    <!-- Vertical Timeline Pipeline -->
                    <div style="max-width:960px; margin:0 auto; position:relative;">
                        
                        <!-- Timeline Connector Bar -->
                        <div style="position:absolute; top:40px; bottom:60px; left:35px; width:4px; background:linear-gradient(180deg, #2563EB 0%, #60A5FA 50%, #10B981 100%); border-radius:2px; display:block;"></div>

                        <!-- Phase 01 -->
                        <div style="display:flex; gap:2.5rem; margin-bottom:3.5rem; position:relative;">
                            <div style="width:74px; height:74px; border-radius:50%; background:#0F1B3D; border:4px solid #2563EB; color:#FFFFFF; display:flex; flex-direction:column; align-items:center; justify-content:center; flex-shrink:0; z-index:2; box-shadow:0 0 0 6px #F8FAFC, 0 8px 20px rgba(37,99,235,0.3);">
                                <span style="font-size:0.7rem; font-weight:800; color:#93C5FD; line-height:1;">PHASE</span>
                                <span style="font-size:1.35rem; font-weight:800; line-height:1;">01</span>
                            </div>
                            <div class="bws-card" style="flex:1; padding:2.5rem; background:#FFFFFF; border:1px solid #E2E8F0; border-radius:16px; box-shadow:0 8px 30px rgba(15,27,61,0.06);">
                                <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:0.75rem; margin-bottom:1rem;">
                                    <div>
                                        <span style="font-size:0.75rem; font-weight:700; color:#2563EB; background:#EFF6FF; padding:0.25rem 0.6rem; border-radius:4px; text-transform:uppercase; letter-spacing:0.05em;">Days 1–15 &bull; Diagnostic Sprint</span>
                                        <h3 style="font-size:1.5rem; color:#0F1B3D; margin:0.5rem 0 0; font-weight:800;">Forensic Crawl, Indexation &amp; Entity Diagnostic</h3>
                                    </div>
                                    <span style="font-size:0.8rem; background:#F1F5F9; color:#475569; padding:0.35rem 0.75rem; border-radius:6px; font-weight:600;">
                                        Diagnostic Milestone
                                    </span>
                                </div>
                                <p style="color:#475569; font-size:1rem; line-height:1.7; margin-bottom:1.5rem;">
                                    We conduct a manual 20-point architectural inspection analyzing server crawl logs, Google Search Console query distributions, Core Web Vitals, canonical discrepancies, index bloat, and competitor entity gaps across your target US commercial verticals.
                                </p>

                                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:1rem; margin-bottom:1.5rem;">
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#2563EB;">✓</span> 20-Point Code Audit
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Uncover silent crawl traps, redirect hops, and canonical loops.</p>
                                    </div>
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#2563EB;">✓</span> GSC Query Telemetry Matrix
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Map revenue-driving commercial terms vs. cannibalized pages.</p>
                                    </div>
                                </div>

                                <div style="padding:1rem 1.25rem; background:#EFF6FF; border-left:4px solid #2563EB; border-radius:0 8px 8px 0; font-size:0.875rem; color:#1E3A8A; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.75rem;">
                                    <span><strong>Client Checkpoint:</strong> 45-Minute Senior Architect Presentation with Humayun Kabir Nishan &amp; Actionable Audit Roadmap (PDF).</span>
                                    <span style="font-weight:700; color:#2563EB; font-size:0.8125rem;">Milestone 1 Verified</span>
                                </div>
                            </div>
                        </div>

                        <!-- Phase 02 -->
                        <div style="display:flex; gap:2.5rem; margin-bottom:3.5rem; position:relative;">
                            <div style="width:74px; height:74px; border-radius:50%; background:#0F1B3D; border:4px solid #2563EB; color:#FFFFFF; display:flex; flex-direction:column; align-items:center; justify-content:center; flex-shrink:0; z-index:2; box-shadow:0 0 0 6px #F8FAFC, 0 8px 20px rgba(37,99,235,0.3);">
                                <span style="font-size:0.7rem; font-weight:800; color:#93C5FD; line-height:1;">PHASE</span>
                                <span style="font-size:1.35rem; font-weight:800; line-height:1;">02</span>
                            </div>
                            <div class="bws-card" style="flex:1; padding:2.5rem; background:#FFFFFF; border:1px solid #E2E8F0; border-radius:16px; box-shadow:0 8px 30px rgba(15,27,61,0.06);">
                                <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:0.75rem; margin-bottom:1rem;">
                                    <div>
                                        <span style="font-size:0.75rem; font-weight:700; color:#2563EB; background:#EFF6FF; padding:0.25rem 0.6rem; border-radius:4px; text-transform:uppercase; letter-spacing:0.05em;">Days 16–35 &bull; Technical Hardening</span>
                                        <h3 style="font-size:1.5rem; color:#0F1B3D; margin:0.5rem 0 0; font-weight:800;">Code-Level Remediation &amp; Infrastructure Hardening</h3>
                                    </div>
                                    <span style="font-size:0.8rem; background:#F1F5F9; color:#475569; padding:0.35rem 0.75rem; border-radius:6px; font-weight:600;">
                                        Technical Milestone
                                    </span>
                                </div>
                                <p style="color:#475569; font-size:1rem; line-height:1.7; margin-bottom:1.5rem;">
                                    We resolve technical debt in collaboration with your dev team or deploy code-level changes directly. We eliminate 301/404 chains, fix canonical loops, purge index bloat, configure XML sitemap hierarchy, and deploy custom nested JSON-LD schema graphs.
                                </p>

                                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:1rem; margin-bottom:1.5rem;">
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#2563EB;">✓</span> Nested Schema Graph Design
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Enterprise Organization, Service, and GeoCircle JSON-LD markup.</p>
                                    </div>
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#2563EB;">✓</span> Crawl Budget Optimization
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Purge thin/faceted URLs so Googlebot focuses 100% on money pages.</p>
                                    </div>
                                </div>

                                <div style="padding:1rem 1.25rem; background:#EFF6FF; border-left:4px solid #2563EB; border-radius:0 8px 8px 0; font-size:0.875rem; color:#1E3A8A; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.75rem;">
                                    <span><strong>Client Checkpoint:</strong> Verification of green Core Web Vitals, 100% valid schema in Google Rich Results Test, and GSC index clean-up.</span>
                                    <span style="font-weight:700; color:#2563EB; font-size:0.8125rem;">Milestone 2 Verified</span>
                                </div>
                            </div>
                        </div>

                        <!-- Phase 03 -->
                        <div style="display:flex; gap:2.5rem; margin-bottom:3.5rem; position:relative;">
                            <div style="width:74px; height:74px; border-radius:50%; background:#0F1B3D; border:4px solid #2563EB; color:#FFFFFF; display:flex; flex-direction:column; align-items:center; justify-content:center; flex-shrink:0; z-index:2; box-shadow:0 0 0 6px #F8FAFC, 0 8px 20px rgba(37,99,235,0.3);">
                                <span style="font-size:0.7rem; font-weight:800; color:#93C5FD; line-height:1;">PHASE</span>
                                <span style="font-size:1.35rem; font-weight:800; line-height:1;">03</span>
                            </div>
                            <div class="bws-card" style="flex:1; padding:2.5rem; background:#FFFFFF; border:1px solid #E2E8F0; border-radius:16px; box-shadow:0 8px 30px rgba(15,27,61,0.06);">
                                <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:0.75rem; margin-bottom:1rem;">
                                    <div>
                                        <span style="font-size:0.75rem; font-weight:700; color:#2563EB; background:#EFF6FF; padding:0.25rem 0.6rem; border-radius:4px; text-transform:uppercase; letter-spacing:0.05em;">Days 36–60 &bull; Content &amp; Entity Architecture</span>
                                        <h3 style="font-size:1.5rem; color:#0F1B3D; margin:0.5rem 0 0; font-weight:800;">Commercial Intent Silos &amp; Topical Knowledge Hubs</h3>
                                    </div>
                                    <span style="font-size:0.8rem; background:#F1F5F9; color:#475569; padding:0.35rem 0.75rem; border-radius:6px; font-weight:600;">
                                        Content Milestone
                                    </span>
                                </div>
                                <p style="color:#475569; font-size:1rem; line-height:1.7; margin-bottom:1.5rem;">
                                    We design high-converting, intent-mapped topic clusters that target commercial decision-makers at each procurement stage. We establish clear internal PageRank routing between pillar pages, service landing pages, and educational knowledge nodes.
                                </p>

                                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:1rem; margin-bottom:1.5rem;">
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#2563EB;">✓</span> Topical Authority Silos
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Structured internal linking eliminating cannibalization and boosting priority URLs.</p>
                                    </div>
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#2563EB;">✓</span> Commercial Intent Conversion
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">On-page lead triggers, comparison matrices, and clear RFP consultation funnels.</p>
                                    </div>
                                </div>

                                <div style="padding:1rem 1.25rem; background:#EFF6FF; border-left:4px solid #2563EB; border-radius:0 8px 8px 0; font-size:0.875rem; color:#1E3A8A; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.75rem;">
                                    <span><strong>Client Checkpoint:</strong> Content silo architecture review, editorial approval workflow, and live publishing deployment.</span>
                                    <span style="font-weight:700; color:#2563EB; font-size:0.8125rem;">Milestone 3 Verified</span>
                                </div>
                            </div>
                        </div>

                        <!-- Phase 04 -->
                        <div style="display:flex; gap:2.5rem; margin-bottom:3.5rem; position:relative;">
                            <div style="width:74px; height:74px; border-radius:50%; background:#0F1B3D; border:4px solid #2563EB; color:#FFFFFF; display:flex; flex-direction:column; align-items:center; justify-content:center; flex-shrink:0; z-index:2; box-shadow:0 0 0 6px #F8FAFC, 0 8px 20px rgba(37,99,235,0.3);">
                                <span style="font-size:0.7rem; font-weight:800; color:#93C5FD; line-height:1;">PHASE</span>
                                <span style="font-size:1.35rem; font-weight:800; line-height:1;">04</span>
                            </div>
                            <div class="bws-card" style="flex:1; padding:2.5rem; background:#FFFFFF; border:1px solid #E2E8F0; border-radius:16px; box-shadow:0 8px 30px rgba(15,27,61,0.06);">
                                <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:0.75rem; margin-bottom:1rem;">
                                    <div>
                                        <span style="font-size:0.75rem; font-weight:700; color:#2563EB; background:#EFF6FF; padding:0.25rem 0.6rem; border-radius:4px; text-transform:uppercase; letter-spacing:0.05em;">Days 61–80 &bull; Local &amp; Authority Expansion</span>
                                        <h3 style="font-size:1.5rem; color:#0F1B3D; margin:0.5rem 0 0; font-weight:800;">Local Map Pack Dominance &amp; High-Tier Editorial PR</h3>
                                    </div>
                                    <span style="font-size:0.8rem; background:#F1F5F9; color:#475569; padding:0.35rem 0.75rem; border-radius:6px; font-weight:600;">
                                        Authority Milestone
                                    </span>
                                </div>
                                <p style="color:#475569; font-size:1rem; line-height:1.7; margin-bottom:1.5rem;">
                                    For multi-location, regional, and national brands, we optimize Google Business Profiles for map pack dominance across target US metro areas. We execute editorial PR outreach to secure contextual, editorially endorsed links from authoritative trade publications.
                                </p>

                                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:1rem; margin-bottom:1.5rem;">
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#2563EB;">✓</span> Multi-Market GBP Optimization
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Top-3 Google Map Pack visibility across targeted regional metros.</p>
                                    </div>
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#2563EB;">✓</span> Digital PR &amp; Contextual Authority
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Editorial mentions in trusted industry trade publications—zero PBN spam.</p>
                                    </div>
                                </div>

                                <div style="padding:1rem 1.25rem; background:#EFF6FF; border-left:4px solid #2563EB; border-radius:0 8px 8px 0; font-size:0.875rem; color:#1E3A8A; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.75rem;">
                                    <span><strong>Client Checkpoint:</strong> Live backlink acquisition audit sheet and Local 3-Pack rank tracking report.</span>
                                    <span style="font-weight:700; color:#2563EB; font-size:0.8125rem;">Milestone 4 Verified</span>
                                </div>
                            </div>
                        </div>

                        <!-- Phase 05 -->
                        <div style="display:flex; gap:2.5rem; position:relative;">
                            <div style="width:74px; height:74px; border-radius:50%; background:#0F1B3D; border:4px solid #10B981; color:#FFFFFF; display:flex; flex-direction:column; align-items:center; justify-content:center; flex-shrink:0; z-index:2; box-shadow:0 0 0 6px #F8FAFC, 0 8px 20px rgba(16,185,129,0.3);">
                                <span style="font-size:0.7rem; font-weight:800; color:#A7F3D0; line-height:1;">PHASE</span>
                                <span style="font-size:1.35rem; font-weight:800; line-height:1;">05</span>
                            </div>
                            <div class="bws-card" style="flex:1; padding:2.5rem; background:#FFFFFF; border:1px solid #E2E8F0; border-radius:16px; box-shadow:0 8px 30px rgba(15,27,61,0.06);">
                                <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:0.75rem; margin-bottom:1rem;">
                                    <div>
                                        <span style="font-size:0.75rem; font-weight:700; color:#10B981; background:#ECFDF5; padding:0.25rem 0.6rem; border-radius:4px; text-transform:uppercase; letter-spacing:0.05em;">Days 81–90+ &bull; Continuous Telemetry &amp; AI Defense</span>
                                        <h3 style="font-size:1.5rem; color:#0F1B3D; margin:0.5rem 0 0; font-weight:800;">Compounding Telemetry, AI Overview Defense &amp; Scale</h3>
                                    </div>
                                    <span style="font-size:0.8rem; background:#F1F5F9; color:#475569; padding:0.35rem 0.75rem; border-radius:6px; font-weight:600;">
                                        Compounding ROI
                                    </span>
                                </div>
                                <p style="color:#475569; font-size:1rem; line-height:1.7; margin-bottom:1.5rem;">
                                    Search engine dominance is not a one-time project. We track weekly Google Search Console telemetry to detect algorithm volatility, protect #1 rankings, and optimize brand citations across LLMs (ChatGPT, Google AI Overviews, Perplexity).
                                </p>

                                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:1rem; margin-bottom:1.5rem;">
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#10B981;">✓</span> AI Overview Citation Defense
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Structured entity data ensuring LLMs cite your brand as the definitive source.</p>
                                    </div>
                                    <div style="padding:1rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px;">
                                        <div style="font-weight:700; color:#0F1B3D; font-size:0.875rem; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.4rem;">
                                            <span style="color:#10B981;">✓</span> Weekly Telemetry &amp; GSC Dashboards
                                        </div>
                                        <p style="font-size:0.8125rem; color:#64748B; margin:0; line-height:1.5;">Live, verifiable Search Console performance reports with zero agency fluff.</p>
                                    </div>
                                </div>

                                <div style="padding:1rem 1.25rem; background:#ECFDF5; border-left:4px solid #10B981; border-radius:0 8px 8px 0; font-size:0.875rem; color:#065F46; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.75rem;">
                                    <span><strong>Client Checkpoint:</strong> 90-Day Executive Strategic Review, ROI impact calculation, and Phase 2 expansion sprint.</span>
                                    <span style="font-weight:700; color:#059669; font-size:0.8125rem;">Compounding Growth</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Agency Comparison Section -->
            <section class="bws-section" style="background:var(--bws-white); padding:5rem 0;">
                <div class="bws-container">
                    <div style="text-align:center; max-width:720px; margin:0 auto 3.5rem;">
                        <span class="bws-eyebrow" style="color:#2563EB;"><?php esc_html_e( 'TRANSPARENCY BENCHMARK', 'bluewireseo' ); ?></span>
                        <h2 style="font-size:clamp(1.85rem, 3.5vw, 2.5rem); margin:0.75rem 0 1rem;"><?php esc_html_e( 'Why our engineering model outperforms generic agencies.', 'bluewireseo' ); ?></h2>
                        <p style="color:var(--bws-text-secondary); font-size:1.05rem; line-height:1.65; margin:0;">
                            <?php esc_html_e( 'See how BlueWireSEO differs from traditional marketing agencies that rely on junior account managers and automated PDF reports.', 'bluewireseo' ); ?>
                        </p>
                    </div>

                    <div style="max-width:880px; margin:0 auto; overflow-x:auto;">
                        <table style="width:100%; border-collapse:collapse; background:#FFFFFF; border:1px solid #E2E8F0; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.04);">
                            <thead>
                                <tr style="background:#0F1B3D; color:#FFFFFF;">
                                    <th style="padding:1.25rem 1.5rem; text-align:left; font-size:0.95rem; font-weight:700;">Strategic Factor</th>
                                    <th style="padding:1.25rem 1.5rem; text-align:left; font-size:0.95rem; font-weight:700; color:#93C5FD;">BlueWireSEO Architecture</th>
                                    <th style="padding:1.25rem 1.5rem; text-align:left; font-size:0.95rem; font-weight:600; color:#94A3B8;">Generic Retainer Agencies</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid #F1F5F9;">
                                    <td style="padding:1.1rem 1.5rem; font-weight:600; color:#1E293B;">Senior Leadership</td>
                                    <td style="padding:1.1rem 1.5rem; color:#2563EB; font-weight:700; background:#EFF6FF;">Direct Lead Architect (Nishan)</td>
                                    <td style="padding:1.1rem 1.5rem; color:#64748B;">Junior account coordinator</td>
                                </tr>
                                <tr style="border-bottom:1px solid #F1F5F9; background:#FAFAFA;">
                                    <td style="padding:1.1rem 1.5rem; font-weight:600; color:#1E293B;">SEO Focus</td>
                                    <td style="padding:1.1rem 1.5rem; color:#2563EB; font-weight:700; background:#EFF6FF;">Semantic entity graphs &amp; code</td>
                                    <td style="padding:1.1rem 1.5rem; color:#64748B;">Keyword density &amp; meta tags</td>
                                </tr>
                                <tr style="border-bottom:1px solid #F1F5F9;">
                                    <td style="padding:1.1rem 1.5rem; font-weight:600; color:#1E293B;">Data Citations</td>
                                    <td style="padding:1.1rem 1.5rem; color:#2563EB; font-weight:700; background:#EFF6FF;">Raw Google Search Console telemetry</td>
                                    <td style="padding:1.1rem 1.5rem; color:#64748B;">Vanity third-party traffic graphs</td>
                                </tr>
                                <tr style="border-bottom:1px solid #F1F5F9; background:#FAFAFA;">
                                    <td style="padding:1.1rem 1.5rem; font-weight:600; color:#1E293B;">Contract Structure</td>
                                    <td style="padding:1.1rem 1.5rem; color:#2563EB; font-weight:700; background:#EFF6FF;">Agile 90-day sprints with deliverables</td>
                                    <td style="padding:1.1rem 1.5rem; color:#64748B;">12-month lock-in with zero guarantees</td>
                                </tr>
                                <tr>
                                    <td style="padding:1.1rem 1.5rem; font-weight:600; color:#1E293B;">AI Overview Defense</td>
                                    <td style="padding:1.1rem 1.5rem; color:#2563EB; font-weight:700; background:#EFF6FF;">JSON-LD Knowledge Graph nodes</td>
                                    <td style="padding:1.1rem 1.5rem; color:#64748B;">Zero AI search strategy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Interactive Conversion Section -->
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
