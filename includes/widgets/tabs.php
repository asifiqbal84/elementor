<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Tabs extends Widget_Base {

	public function get_name() {
		return 'tabs';
	}

	public function get_title() {
		return __( 'Tabs', 'elementor' );
	}

	public function get_icon() {
		return 'tabs';
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Tabs', 'elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => __( 'Tabs Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => __( 'Tab #1', 'elementor' ),
						'tab_content' => __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'tab_title' => __( 'Tab #2', 'elementor' ),
						'tab_content' => __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'fields' => [
					[
						'name' => 'tab_title',
						'label' => __( 'Title & Content', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Tab Title', 'elementor' ),
						'placeholder' => __( 'Tab Title', 'elementor' ),
						'label_block' => true,
					],
					[
						'name' => 'tab_content',
						'label' => __( 'Content', 'elementor' ),
						'default' => __( 'Tab Content', 'elementor' ),
						'placeholder' => __( 'Tab Content', 'elementor' ),
						'type' => Controls_Manager::TEXTAREA,
						'show_label' => false,
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_tabs_style',
			[
				'label' => __( 'Tabs Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span:before' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span:after' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span:after' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tab-content' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title.active' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tab-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_color',
			[
				'label' => __( 'Title Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'tab_active_color',
			[
				'label' => __( 'Active Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'selector' => '{{WRAPPER}} .elementor-tab-title > span',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_tabs_content',
			[
				'label' => __( 'Tabs Content', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .elementor-tab-content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$tabs = $this->get_settings( 'tabs' );
		?>
		<div class="elementor-tabs">
			<?php $counter = 1; ?>
			<div class="elementor-tabs-wrapper">
				<?php foreach ( $tabs as $item ) : ?>
					<div class="elementor-tab-title" data-tab="<?php echo $counter; ?>"><span><?php echo $item['tab_title']; ?></span></div>
				<?php
					$counter++;
				endforeach; ?>
			</div>

			<?php $counter = 1; ?>
			<div class="elementor-tabs-content-wrapper">
				<?php foreach ( $tabs as $item ) : ?>
					<div class="elementor-tab-content" data-tab="<?php echo $counter; ?>"><?php echo $this->parse_text_editor( $item['tab_content'] ); ?></div>
				<?php
					$counter++;
				endforeach; ?>
			</div>
		</div>
		<?php
	}

	protected function _content_template() {
		?>
		<div class="elementor-tabs" data-active-tab="{{ editSettings.activeItemIndex ? editSettings.activeItemIndex : 0 }}">
			<#
			if ( settings.tabs ) {
				var counter = 1; #>
				<div class="elementor-tabs-wrapper">
					<#
					_.each( settings.tabs, function( item ) { #>
						<div class="elementor-tab-title" data-tab="{{ counter }}"><span>{{{ item.tab_title }}}</span></div>
					<#
						counter++;
					} ); #>
				</div>

				<# counter = 1; #>
				<div class="elementor-tabs-content-wrapper">
					<#
					_.each( settings.tabs, function( item ) { #>
						<div class="elementor-tab-content" data-tab="{{ counter }}">{{{ item.tab_content }}}</div>
					<#
					counter++;
					} ); #>
				</div>
			<# } #>
		</div>
		<?php
	}
}
