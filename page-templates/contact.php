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
                    <div style="max-width: 760px; margin-top: 1.25rem;">
                        <p class="bws-eyebrow" style="color: #93C5FD;"><?php esc_html_e( 'DIRECT ACCESS', 'bluewireseo' ); ?></p>
                        <h1 class="bws-hero-title" style="color:#FFFFFF; font-size:clamp(2.25rem, 4.5vw, 3.5rem); line-height:1.15; margin-bottom:1rem;">
                            <?php the_title(); ?>
                        </h1>
                        <p class="bws-hero-subtitle" style="color:rgba(255,255,255,0.85); font-size:1.125rem; line-height:1.65;">
                            <?php esc_html_e( 'Have a question about your site’s search architecture, or want a custom strategic proposal? Connect directly with Humayun Kabir Nishan.', 'bluewireseo' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <section class="bws-section" style="background:var(--bws-white); padding:4rem 0;">
                <div class="bws-container">
                    <div style="display:grid; grid-template-columns: 1fr 1.2fr; gap:3.5rem;">
                        <!-- Contact Info -->
                        <div>
                            <h2 style="font-size:1.75rem; margin-bottom:1.5rem;"><?php esc_html_e( 'Get in Touch Directly', 'bluewireseo' ); ?></h2>
                            <p style="font-size:1rem; color:var(--bws-text-secondary); line-height:1.7; margin-bottom:2rem;">
                                <?php esc_html_e( 'We do not route client inquiries to junior account executives. Every inquiry is reviewed personally by our senior SEO strategist.', 'bluewireseo' ); ?>
                            </p>

                            <div style="display:flex; flex-direction:column; gap:1.25rem; margin-bottom:2.5rem;">
                                <div style="display:flex; gap:1rem; align-items:center;">
                                    <div style="width:44px; height:44px; border-radius:50%; background:rgba(37,99,235,0.1); color:var(--bws-primary); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </div>
                                    <div>
                                        <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Email Us', 'bluewireseo' ); ?></div>
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
                                        <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Call or WhatsApp', 'bluewireseo' ); ?></div>
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
                                        <div style="font-size:0.8rem; color:var(--bws-text-muted); font-weight:600; text-transform:uppercase;"><?php esc_html_e( 'Operating Hours', 'bluewireseo' ); ?></div>
                                        <div style="color:var(--bws-heading); font-size:1rem; font-weight:600;">
                                            <?php esc_html_e( 'US Business Hours (EST / CST / PST)', 'bluewireseo' ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="bws-card" style="padding:2.5rem 2rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-lg); background:var(--bws-white); box-shadow:var(--bws-shadow-lg);">
                            <h3 style="font-size:1.375rem; margin-bottom:0.5rem;"><?php esc_html_e( 'Send a Direct Message', 'bluewireseo' ); ?></h3>
                            <p style="font-size:0.875rem; color:var(--bws-text-muted); margin-bottom:1.75rem;">
                                <?php esc_html_e( 'We typically respond within 2-4 business hours.', 'bluewireseo' ); ?>
                            </p>

                            <form action="<?php echo esc_url( home_url( '/contact/' ) ); ?>" method="post" style="display:flex; flex-direction:column; gap:1.25rem;">
                                <div>
                                    <label for="contact_name" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Full Name *', 'bluewireseo' ); ?></label>
                                    <input type="text" id="contact_name" name="name" required placeholder="John Doe" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div>
                                    <label for="contact_email" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Work Email *', 'bluewireseo' ); ?></label>
                                    <input type="email" id="contact_email" name="email" required placeholder="john@company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div>
                                    <label for="contact_website" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'Website URL', 'bluewireseo' ); ?></label>
                                    <input type="url" id="contact_website" name="website" placeholder="https://company.com" style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem;" />
                                </div>

                                <div>
                                    <label for="contact_message" style="display:block; font-size:0.875rem; font-weight:600; margin-bottom:0.35rem;"><?php esc_html_e( 'How can we help your business? *', 'bluewireseo' ); ?></label>
                                    <textarea id="contact_message" name="message" rows="4" required placeholder="Tell us about your organic search goals or challenges..." style="width:100%; padding:0.75rem 1rem; border:1px solid var(--bws-border); border-radius:var(--bws-radius-md); font-family:inherit; font-size:0.9375rem; resize:vertical;"></textarea>
                                </div>

                                <button type="submit" class="bws-btn bws-btn-primary bws-btn-lg" style="width:100%; justify-content:center; gap:0.5rem;">
                                    <span><?php esc_html_e( 'Send Message', 'bluewireseo' ); ?></span>
                                    <span style="display:inline-flex; width:18px; height:18px; flex-shrink:0;">
                                        <?php echo bluewireseo_icon( 'arrow-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    </span>
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
