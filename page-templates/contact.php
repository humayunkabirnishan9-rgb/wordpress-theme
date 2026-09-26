<?php
/**
 * Template Name: BlueWireSEO — Contact Page Template
 * Template Post Type: page, post, bws_portfolio, bws_case_study, bws_service, bws_industry
 *
 * @package BlueWireSEO
 */

get_header();

$email = bluewireseo_get_email();
$phone = bluewireseo_get_phone();
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
            <div class="bws-page-hero" style="background: linear-gradient(135deg, #0F1B3D 0%, #16244C 50%, #1E2D5A 100%); color:#FFFFFF; padding: 4.5rem 0 3.5rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width: 780px; margin-top: 1.25rem;">
                        <p class="bws-eyebrow" style="color: #93C5FD;"><?php esc_html_e( 'STRATEGIC CONSULTATION', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'Request a forensic search evaluation or discuss enterprise search strategy for your commercial business. Our senior strategy team evaluates every inquiry.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <div style="display:grid; grid-template-columns: 1fr 1.25fr; gap:3.5rem; align-items:start;">
                        <!-- Company & Leadership Info -->
                        <div>
                            <h2 style="font-size:1.75rem; color:var(--bws-heading); margin-bottom:1.25rem;"><?php esc_html_e( 'Enterprise Consultation & Strategy', 'bluewireseo' ); ?></h2>
                            
                            <!-- Founder Introduction -->
                            <div style="padding:1.5rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:var(--bws-radius-md); margin-bottom:2rem;">
                                <div style="display:flex; align-items:center; gap:0.875rem; margin-bottom:0.875rem;">
                                    <div style="width:48px; height:48px; border-radius:50%; background:#2563EB; color:#FFFFFF; font-weight:800; font-size:1.125rem; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        HKN
                                    </div>
                                    <div>
                                        <div style="font-weight:700; color:#0F1B3D; font-size:1.0625rem;">Humayun Kabir Nishan</div>
                                        <div style="font-size:0.8125rem; color:#2563EB; font-weight:600; text-transform:uppercase; letter-spacing:0.04em;">Founder &amp; Principal SEO Architect</div>
                                    </div>
                                </div>
                                <p style="font-size:0.875rem; color:var(--bws-text-secondary); line-height:1.65; margin:0;">
                                    <?php esc_html_e( 'BlueWireSEO was founded by Humayun Kabir Nishan to deliver high-impact semantic entity modeling, technical crawl remediation, and revenue-focused organic visibility for US commercial enterprises.', 'bluewireseo' ); ?>
                                </p>
                            </div>

                            <div style="display:flex; flex-direction:column; gap:1.25rem; margin-bottom:2.5rem;">
                                <div style="display:flex; gap:1rem; align-items:center;">
                                    <div style="width:44px; height:44px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Official Email Inquiries', 'bluewireseo' ); ?></div>
                                        <a href="mailto:<?php echo esc_attr( $email ); ?>" style="color:var(--bws-heading); font-size:1.0625rem; font-weight:700; text-decoration:none;">
                                            <?php echo esc_html( $email ); ?>
                                        </a>
                                    </div>
                                </div>

                                <div style="display:flex; gap:1rem; align-items:center;">
                                    <div style="width:44px; height:44px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Telephone & WhatsApp', 'bluewireseo' ); ?></div>
                                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" style="color:var(--bws-heading); font-size:1.0625rem; font-weight:700; text-decoration:none;">
                                            <?php echo esc_html( $phone ); ?>
                                        </a>
                                    </div>
                                </div>

                                <div style="display:flex; gap:1rem; align-items:center;">
                                    <div style="width:44px; height:44px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'globe' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Operational Hours', 'bluewireseo' ); ?></div>
                                        <div style="color:var(--bws-heading); font-size:1rem; font-weight:600;">
                                            <?php esc_html_e( 'US Business Hours (EST / CST / PST)', 'bluewireseo' ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="padding:1.25rem; background:#F0FDF4; border:1px solid #BBF7D0; border-radius:var(--bws-radius-md);">
                                <div style="font-weight:700; color:#166534; font-size:0.9rem; margin-bottom:0.25rem;">
                                    <?php esc_html_e( '✓ Confidential Evaluation Guarantee', 'bluewireseo' ); ?>
                                </div>
                                <p style="font-size:0.8125rem; color:#15803D; margin:0; line-height:1.5;">
                                    <?php esc_html_e( 'Every inquiry is reviewed directly by our senior technical architects. Mutual non-disclosure agreements (NDAs) are gladly provided upon request.', 'bluewireseo' ); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Professional Corporate Inquiry Form -->
                        <div class="bws-card" style="padding:2.5rem 2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); background:var(--bws-white); box-shadow:var(--bws-shadow-lg);">
                            <h3 style="font-size:1.375rem; margin-bottom:0.5rem; color:var(--bws-heading);"><?php esc_html_e( 'Submit Consultation Request', 'bluewireseo' ); ?></h3>
                            <p style="font-size:0.875rem; color:var(--bws-text-muted); margin-bottom:1.75rem;">
                                <?php esc_html_e( 'Complete the form below to receive a strategic review within 24 business hours.', 'bluewireseo' ); ?>
                            </p>

                            <form action="<?php echo esc_url( home_url( '/contact/' ) ); ?>" method="post" style="display:flex; flex-direction:column; gap:1.25rem;">
                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                                    <div>
                                        <label for="contact_name" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Full Name *', 'bluewireseo' ); ?></label>
                                        <input type="text" id="contact_name" name="name" required placeholder="John Smith" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                    </div>
                                    <div>
                                        <label for="contact_email" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                        <input type="email" id="contact_email" name="email" required placeholder="john@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                    </div>
                                </div>

                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
                                    <div>
                                        <label for="contact_website" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Website URL *', 'bluewireseo' ); ?></label>
                                        <input type="url" id="contact_website" name="website" required placeholder="https://yourbrand.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                    </div>
                                    <div>
                                        <label for="contact_service" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Service Required', 'bluewireseo' ); ?></label>
                                        <select id="contact_service" name="service" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem; background:#FFFFFF;">
                                            <option value="Semantic SEO"><?php esc_html_e( 'Semantic SEO Architecture', 'bluewireseo' ); ?></option>
                                            <option value="Technical SEO"><?php esc_html_e( 'Technical Crawl Audit & Remediation', 'bluewireseo' ); ?></option>
                                            <option value="Local SEO & GBP"><?php esc_html_e( 'Local SEO & Multi-Location GBP', 'bluewireseo' ); ?></option>
                                            <option value="Content & Entity SEO"><?php esc_html_e( 'Content & Entity Strategy', 'bluewireseo' ); ?></option>
                                            <option value="Link Building"><?php esc_html_e( 'High-Authority Link Building', 'bluewireseo' ); ?></option>
                                            <option value="Full Audit"><?php esc_html_e( 'Free 20-Point SEO Audit', 'bluewireseo' ); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="contact_message" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Project Scope & Current Search Goals *', 'bluewireseo' ); ?></label>
                                    <textarea id="contact_message" name="message" rows="4" required placeholder="<?php esc_attr_e( 'Describe your current search bottlenecks, primary markets, and objectives...', 'bluewireseo' ); ?>" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;"></textarea>
                                </div>

                                <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem; font-weight:700;">
                                    <?php esc_html_e( 'Submit Strategic Consultation Request &rarr;', 'bluewireseo' ); ?>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            echo '<div class="bws-elementor-hook" style="display:none;" aria-hidden="true">';
            the_content();
            echo '</div>';
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
