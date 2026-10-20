<?php
/**
 * Title: Section - Details Card Grid
 * Slug: ls-theme/details-card-grid
 * Categories: featured
 * Block Types: core/pattern
 * Description: A "year by year" reference section on the page canvas: dot eyebrow and H2 on the left, an "Expand all" toggle button on the right, and below them a two-column grid of core Details blocks on the default surface.card, each a mono brand-coloured year, a title and a bulleted list that opens on click. Only open cards stretch to their row, so two open cards in a row stay the same height while a closed card keeps its own height whatever its neighbour does, and "Expand all" opens every card and swaps its label to "Collapse all" (assets/js/details-expand-all.js, which also keeps the label in step when cards are opened one by one). Authored for the About History page "Milestones beyond the headlines" section; duplicate or delete a card freely and edit the years, titles and bullets after inserting. Uses the core Details and Button blocks (the button renders a real button element) and falls back to core/group for the header and the grid. Adapts between light and dark mode through surface, text, border and link tokens. SCSS lives in src/scss/structural/details-card-grid.scss.
 * Keywords: details, accordion, years, milestones, timeline, history, expand, about, section
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package ls-theme
 */

$ls_year_cards = array(
	array(
		'year'    => __( '2011', 'ls-theme' ),
		'title'   => __( 'Affiliate Woo Worker & award recognition', 'ls-theme' ),
		'bullets' => array(
			__( 'Became an official Affiliate Woo Worker with WooThemes.', 'ls-theme' ),
			__( 'Ashley Shaw received a Future 100 Platinum Award for inspiring young entrepreneurs.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2012', 'ls-theme' ),
		'title'   => __( 'Hosting WordCamp & community leadership', 'ls-theme' ),
		'bullets' => array(
			__( 'Organised and hosted WordCamp Cape Town 2012, strengthening the local WordPress community.', 'ls-theme' ),
			__( 'Launched regular WordPress Meetups in Cape Town.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2013', 'ls-theme' ),
		'title'   => __( 'Workflow optimisation & community engagement', 'ls-theme' ),
		'bullets' => array(
			__( 'Integrated Zendesk, Trello, Harvest and BugHerd to streamline client support and team collaboration.', 'ls-theme' ),
			__( 'WordPress co‑founder Matt Mullenweg visited Cape Town; LightSpeed facilitated the community session.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2014', 'ls-theme' ),
		'title'   => __( 'Wetu Importer & tour templates', 'ls-theme' ),
		'bullets' => array(
			__( 'Released the Wetu Importer plugin, synchronising WordPress sites with the Wetu Content System.', 'ls-theme' ),
			__( 'Introduced “Comfy Accommodation” and “Karbon Tours” website templates for hospitality and tourism businesses.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2015', 'ls-theme' ),
		'title'   => __( 'Recognised experts & community events', 'ls-theme' ),
		'bullets' => array(
			__( 'Joined the Mailchimp Experts Directory and WooCommerce’s WooExperts program.', 'ls-theme' ),
			__( 'Organised WordPress Agency Meetup in Cape Town.', 'ls-theme' ),
			__( 'Released LSX Theme 1.3 and 1.2.5 with improved layouts and mobile features.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2016', 'ls-theme' ),
		'title'   => __( 'Open‑source tour operator & LSX updates', 'ls-theme' ),
		'bullets' => array(
			__( 'Launched the open‑source LSX Tour Operator plugin with destination management, itinerary generation and premium add‑ons.', 'ls-theme' ),
			__( 'Released LSX 1.8.0 and 1.7.0, adding banners, currencies, mega‑menu extensions and incremental improvements.', 'ls-theme' ),
			__( 'Shared dozens of marketing tips for tour operators, emphasising mobile optimisation, pricing strategies and storytelling.', 'ls-theme' ),
			__( 'Attended WordCamp Cape Town 2016.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2017', 'ls-theme' ),
		'title'   => __( 'Major LSX releases & certifications', 'ls-theme' ),
		'bullets' => array(
			__( 'Released LSX 2.0 and 2.1 with a complete redesign, enhanced WooCommerce integration and new customisation options.', 'ls-theme' ),
			__( 'Earned Codeable Expert certification after rigourous assessment.', 'ls-theme' ),
			__( 'Adopted Sketch for design, improving prototyping and collaboration.', 'ls-theme' ),
			__( 'Continued culture of remote work and team retreats.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2019', 'ls-theme' ),
		'title'   => __( 'Rapid product development & remote culture', 'ls-theme' ),
		'bullets' => array(
			__( 'Released LSX Theme 2.4–2.6 and Tour Operator 1.3–1.4, introducing speed optimisations, Gutenberg block compatibility and new features.', 'ls-theme' ),
			__( 'Launched LSX Blocks on WordPress.org for Gutenberg block building.', 'ls-theme' ),
			__( 'Hosted team retreats and highlighted the benefits of remote working.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2020', 'ls-theme' ),
		'title'   => __( 'Security incident & robust releases', 'ls-theme' ),
		'bullets' => array(
			__( 'Released LSX 2.7–2.9 and LSX Health 2.0, adding block editor enhancements and multi‑plan functionality.', 'ls-theme' ),
			__( 'Faced a ransomware attack; services were restored the same day with strengthened security measures.', 'ls-theme' ),
			__( 'Issued a Covid‑19 update assuring clients of uninterrupted service from LightSpeed’s remote team.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2022', 'ls-theme' ),
		'title'   => __( 'Team growth & redesign plans', 'ls-theme' ),
		'bullets' => array(
			__( 'End‑of‑year update welcomed new team members and hinted at an upcoming website redesign.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2023', 'ls-theme' ),
		'title'   => __( 'LSX Design & awards', 'ls-theme' ),
		'bullets' => array(
			__( 'Launched LSX Design, a full‑site‑editing WordPress theme with robust block integration.', 'ls-theme' ),
			__( 'Released LSX Design 1.1 and 1.2, improving accessibility, dark‑mode styling and mobile responsiveness.', 'ls-theme' ),
			__( 'Published LSX Sharing 2.0 and LSX Mega Menu 2.0, enhancing sharing and navigation.', 'ls-theme' ),
			__( 'Received the African Excellence Award for “Most Innovative WordPress Web Agency 2023 – Western Cape”.', 'ls-theme' ),
			__( 'Applied for Xero’s Beautiful Business Fund to support AI integration and LSX enhancements.', 'ls-theme' ),
			__( 'Redesigned the LightSpeed website using LSX Design 1.2.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2024', 'ls-theme' ),
		'title'   => __( 'Design systems & WordCamp sponsorship', 'ls-theme' ),
		'bullets' => array(
			__( 'Released LSX Design 1.4 with interactive Figma prototypes and compatibility with WordPress 6.6.', 'ls-theme' ),
			__( 'Introduced a new design‑to‑development toolset connecting Figma and Git‑based workflows.', 'ls-theme' ),
			__( 'Re‑engineered the Tour Operator plugin as a modern, block‑based solution and launched a comprehensive Tour Operator Design System on Figma.', 'ls-theme' ),
			__( 'Sponsored WordCamp Cape Town 2024, running competitions and demo sessions to promote LSX products and community engagement.', 'ls-theme' ),
		),
	),
	array(
		'year'    => __( '2025', 'ls-theme' ),
		'title'   => __( 'AI‑powered workflows & new releases', 'ls-theme' ),
		'bullets' => array(
			__( 'Focused on team growth and developer up‑skilling through internships, senior hires and AI‑powered workflows.', 'ls-theme' ),
			__( 'Detailed an AI‑assisted workflow linking Figma, VS Code, GitHub and Copilot, supported by custom prompt libraries.', 'ls-theme' ),
			__( 'Released Tour Operator 2.1 with improved build processes, design system updates and client‑friendly features.', 'ls-theme' ),
			__( 'Documented end‑to‑end project workflows, covering content collection, design, staging feedback and launch processes.', 'ls-theme' ),
			__( 'Advertised opportunities for aspiring WordPress Block Theme developers.', 'ls-theme' ),
		),
	),
);
?>
<!-- wp:group {"align":"full","tagName":"section","className":"ls-year-by-year","style":{"color":{"background":"var:custom|color|surface|canvas"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|100","right":"var:preset|spacing|30","bottom":"var:preset|spacing|100","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull ls-year-by-year has-background" style="background-color:var(--wp--custom--color--surface--canvas);margin-top:0;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group">

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"lightspeed/dot","className":"has-text-color","style":{"color":{"text":"var(--wp--custom--color--text--brand)"},"dimensions":{"width":"8px"}}} /-->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"var:custom|typography|letter-spacing|widest","fontWeight":"var:custom|typography|font-weight|semibold"},"color":{"text":"var(--wp--custom--color--text--brand)"}},"fontSize":"100"} -->
				<p class="has-text-color has-100-font-size" style="color:var(--wp--custom--color--text--brand);font-weight:var(--wp--custom--typography--font-weight--semibold);letter-spacing:var(--wp--custom--typography--letter-spacing--widest);text-transform:uppercase"><?php echo esc_html__( 'Year by year', 'ls-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"var:custom|typography|font-weight|bold"}},"fontSize":"600"} -->
			<h2 class="wp-block-heading has-600-font-size" style="font-weight:var(--wp--custom--typography--font-weight--bold)"><?php echo esc_html__( 'Milestones beyond the headlines', 'ls-theme' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"ls-year-by-year__toggle"} -->
		<div class="wp-block-buttons ls-year-by-year__toggle">
			<!-- wp:button {"tagName":"button","className":"is-style-button-secondary-outline"} -->
			<div class="wp-block-button is-style-button-secondary-outline"><button type="button" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Expand all', 'ls-theme' ); ?></button></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","className":"ls-year-card-grid","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"24rem"}} -->
	<div class="wp-block-group alignwide ls-year-card-grid">
		<?php foreach ( $ls_year_cards as $ls_year_card ) : ?>
		<!-- wp:details {"className":"ls-year-card","fontSize":"200","style":{"border":{"radius":"var:preset|border-radius|300"}}} -->
		<details class="wp-block-details ls-year-card has-200-font-size" style="border-radius:var(--wp--preset--border-radius--300)"><summary><strong><?php echo esc_html( $ls_year_card['year'] ); ?></strong> <?php echo esc_html( $ls_year_card['title'] ); ?></summary>
			<!-- wp:list {"style":{"color":{"text":"var(--wp--custom--color--text--muted)"},"typography":{"fontFamily":"var:preset|font-family|body","fontWeight":"var:custom|typography|font-weight|normal"},"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|70"}}},"fontSize":"200"} -->
			<ul class="wp-block-list has-text-color has-200-font-size" style="color:var(--wp--custom--color--text--muted);font-family:var(--wp--preset--font-family--body);font-weight:var(--wp--custom--typography--font-weight--normal);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--70)">
				<?php foreach ( $ls_year_card['bullets'] as $ls_year_bullet ) : ?>
				<!-- wp:list-item -->
				<li><?php echo esc_html( $ls_year_bullet ); ?></li>
				<!-- /wp:list-item -->
				<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->
		</details>
		<!-- /wp:details -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
