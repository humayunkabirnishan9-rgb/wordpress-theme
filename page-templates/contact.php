<?php
/**
 * Template Name: BlueWireSEO — Contact Page Template
 * Template Post Type: page
 *
 * @package BlueWireSEO
 */

get_header();

$email    = bluewireseo_get_email();
$phone    = bluewireseo_get_phone();
$audit_url = bluewireseo_get_audit_url();
?>

<main id="primary-content" class="bws-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();

        $elementor_data = get_post_meta( get_the_ID(), '_elementor_data', true );
        $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

        if ( ! empty( $elementor_data ) && 'builder' === $elementor_edit_mode && strlen( $elementor_data ) > 10 ) {
            the_content();
        } else {
            ?>
            <div class="bws-page-hero" style="background:var(--bws-light-bg);border-bottom:1px solid var(--bws-border);padding:3.5rem 0 3rem;">
                <div class="bws-container">
                    <?php echo bluewireseo_breadcrumb(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <div style="max-width:680px;margin-top:1.25rem;">
                        <p class="bws-eyebrow"><?php esc_html_e( 'GET IN TOUCH', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="font-size:clamp(2.25rem,4.5vw,3.25rem);margin-bottom:1rem;"><?php the_title(); ?></h1>
                        <p class="bws-hero-subtitle" style="font-size:1.125rem;color:var(--bws-text-secondary);line-height:1.65;">
                            <?php esc_html_e( 'Tell us about your business, current search challenges, and growth goals. We will review your site and respond within 24 business hours.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section-sm">
                <div class="bws-container">
                    <?php
                    $content = get_the_content();
                    if ( ! empty( $content ) && stripos( $content, 'This is the' ) === false ) :
                        echo '<div class="bws-content" style="max-width:800px;margin-bottom:3rem;">';
                        the_content();
                        echo '</div>';
                    endif;
                    ?>

                    <div class="bws-grid-2" style="gap:3rem;align-items:start;">
                        <!-- Contact Details & Direct Channels -->
                        <div>
                            <h2 style="font-size:1.75rem;margin-bottom:1rem;"><?php esc_html_e( 'Direct Consultation', 'bluewireseo' ); ?></h2>
                            <p style="color:var(--bws-text-secondary);font-size:1rem;line-height:1.65;margin-bottom:2rem;">
                                <?php esc_html_e( 'We work with founders, marketing directors, and business operators across the United States. Inquiries are reviewed directly by our technical SEO specialists.', 'bluewireseo' ); ?>
                            </p>

                            <div style="display:flex;flex-direction:column;gap:1.25rem;margin-bottom:2.5rem;">
                                <div style="display:flex;gap:1rem;align-items:center;padding:1.25rem;background:var(--bws-light-bg);border-radius:var(--bws-radius-md);border:1px solid var(--bws-border);">
                                    <div style="width:44px;height:44px;border-radius:10px;background:var(--bws-primary-light);color:var(--bws-primary);display:flex;align-items:center;justify-content:center;">
                                        <?php echo bluewireseo_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <div style="font-size:0.8125rem;color:var(--bws-text-muted);font-weight:600;text-transform:uppercase;letter-spacing:0.05em;"><?php esc_html_e( 'Email Us Directly', 'bluewireseo' ); ?></div>
                                        <a href="mailto:<?php echo esc_attr( $email ); ?>" style="font-size:1.0625rem;color:var(--bws-heading);font-weight:600;text-decoration:none;">
                                            <?php echo esc_html( $email ); ?>
                                        </a>
                                    </div>
                                </div>

                                <div style="display:flex;gap:1rem;align-items:center;padding:1.25rem;background:var(--bws-light-bg);border-radius:var(--bws-radius-md);border:1px solid var(--bws-border);">
                                    <div style="width:44px;height:44px;border-radius:10px;background:var(--bws-primary-light);color:var(--bws-primary);display:flex;align-items:center;justify-content:center;">
                                        <?php echo bluewireseo_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <div style="font-size:0.8125rem;color:var(--bws-text-muted);font-weight:600;text-transform:uppercase;letter-spacing:0.05em;"><?php esc_html_e( 'Phone / WhatsApp', 'bluewireseo' ); ?></div>
                                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" style="font-size:1.0625rem;color:var(--bws-heading);font-weight:600;text-decoration:none;">
                                            <?php echo esc_html( $phone ); ?>
                                        </a>
                                    </div>
                                </div>

                                <div style="display:flex;gap:1rem;align-items:center;padding:1.25rem;background:var(--bws-light-bg);border-radius:var(--bws-radius-md);border:1px solid var(--bws-border);">
                                    <div style="width:44px;height:44px;border-radius:10px;background:var(--bws-primary-light);color:var(--bws-primary);display:flex;align-items:center;justify-content:center;">
                                        <?php echo bluewireseo_icon( 'globe' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <div style="font-size:0.8125rem;color:var(--bws-text-muted);font-weight:600;text-transform:uppercase;letter-spacing:0.05em;"><?php esc_html_e( 'Service Reach', 'bluewireseo' ); ?></div>
                                        <div style="font-size:1rem;color:var(--bws-heading);font-weight:600;">
                                            <?php esc_html_e( 'Remote-First, Serving US Businesses Nationwide', 'bluewireseo' ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="padding:1.5rem;background:var(--bws-primary-light);border-radius:var(--bws-radius-md);border-left:4px solid var(--bws-primary);">
                                <h4 style="font-size:1rem;color:var(--bws-primary-dark);margin-bottom:0.35rem;"><?php esc_html_e( 'Need a full diagnostic instead?', 'bluewireseo' ); ?></h4>
                                <p style="font-size:0.875rem;color:var(--bws-text-secondary);margin-bottom:0.75rem;">
                                    <?php esc_html_e( 'Request our free 20-point technical & semantic audit for actionable recommendations.', 'bluewireseo' ); ?>
                                </p>
                                <a href="<?php echo esc_url( $audit_url ); ?>" class="bws-link-arrow" style="font-weight:600;">
                                    <?php esc_html_e( 'Go to Free SEO Audit &rarr;', 'bluewireseo' ); ?>
                                </a>
                            </div>
                        </div>

                        <!-- Professional Contact Form Area -->
                        <div class="bws-card" style="padding:2.5rem;border:1px solid var(--bws-border);border-radius:var(--bws-radius-lg);box-shadow:var(--bws-shadow-sm);">
                            <h3 style="font-size:1.375rem;margin-bottom:0.5rem;"><?php esc_html_e( 'Send a Message', 'bluewireseo' ); ?></h3>
                            <p style="font-size:0.875rem;color:var(--bws-text-muted);margin-bottom:1.75rem;">
                                <?php esc_html_e( 'Fill out the form below or email us directly at nishan@bluewireseo.com.', 'bluewireseo' ); ?>
                            </p>

                            <form action="" method="post" class="bws-contact-form" style="display:flex;flex-direction:column;gap:1.25rem;">
                                <div>
                                    <label for="bws_name" style="display:block;font-size:0.875rem;font-weight:600;margin-bottom:0.35rem;"><?php esc_html_e( 'Full Name *', 'bluewireseo' ); ?></label>
                                    <input type="text" id="bws_name" name="bws_name" required placeholder="John Smith" style="width:100%;padding:0.75rem 1rem;border:1px solid var(--bws-border);border-radius:var(--bws-radius-md);font-family:inherit;font-size:0.9375rem;" />
                                </div>

                                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                                    <div>
                                        <label for="bws_contact_email" style="display:block;font-size:0.875rem;font-weight:600;margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                        <input type="email" id="bws_contact_email" name="bws_email" required placeholder="john@company.com" style="width:100%;padding:0.75rem 1rem;border:1px solid var(--bws-border);border-radius:var(--bws-radius-md);font-family:inherit;font-size:0.9375rem;" />
                                    </div>
                                    <div>
                                        <label for="bws_website" style="display:block;font-size:0.875rem;font-weight:600;margin-bottom:0.35rem;"><?php esc_html_e( 'Website URL', 'bluewireseo' ); ?></label>
                                        <input type="url" id="bws_website" name="bws_website" placeholder="https://company.com" style="width:100%;padding:0.75rem 1rem;border:1px solid var(--bws-border);border-radius:var(--bws-radius-md);font-family:inherit;font-size:0.9375rem;" />
                                    </div>
                                </div>

                                <div>
                                    <label for="bws_service_interest" style="display:block;font-size:0.875rem;font-weight:600;margin-bottom:0.35rem;"><?php esc_html_e( 'Service Area of Interest', 'bluewireseo' ); ?></label>
                                    <select id="bws_service_interest" name="bws_service" style="width:100%;padding:0.75rem 1rem;border:1px solid var(--bws-border);border-radius:var(--bws-radius-md);font-family:inherit;font-size:0.9375rem;background:#fff;">
                                        <option value="semantic-seo"><?php esc_html_e( 'Semantic SEO & Topic Clusters', 'bluewireseo' ); ?></option>
                                        <option value="technical-seo"><?php esc_html_e( 'Technical SEO & Performance', 'bluewireseo' ); ?></option>
                                        <option value="ooh-seo"><?php esc_html_e( 'OOH & Billboard Advertising SEO', 'bluewireseo' ); ?></option>
                                        <option value="local-seo"><?php esc_html_e( 'Local SEO & Multi-Location GBP', 'bluewireseo' ); ?></option>
                                        <option value="seo-audit"><?php esc_html_e( 'Full Comprehensive SEO Audit', 'bluewireseo' ); ?></option>
                                        <option value="other"><?php esc_html_e( 'Other Custom SEO Requirements', 'bluewireseo' ); ?></option>
                                    </select>
                                </div>

                                <div>
                                    <label for="bws_message" style="display:block;font-size:0.875rem;font-weight:600;margin-bottom:0.35rem;"><?php esc_html_e( 'Tell Us About Your Goals & Challenges *', 'bluewireseo' ); ?></label>
                                    <textarea id="bws_message" name="bws_message" rows="4" required placeholder="Describe your search visibility goals, target markets, or current blockers..." style="width:100%;padding:0.75rem 1rem;border:1px solid var(--bws-border);border-radius:var(--bws-radius-md);font-family:inherit;font-size:0.9375rem;"></textarea>
                                </div>

                                <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%;justify-content:center;">
                                    <?php esc_html_e( 'Send Message', 'bluewireseo' ); ?>
                                    <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                </button>
                                <p style="font-size:0.75rem;color:var(--bws-text-muted);text-align:center;margin:0;">
                                    <?php esc_html_e( 'We respect your privacy. No spam. 100% confidential consultation.', 'bluewireseo' ); ?>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
