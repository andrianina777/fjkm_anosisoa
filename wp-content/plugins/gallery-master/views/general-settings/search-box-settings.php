<?php
/**
 * Template for view and update Search Box Settings.
 *
 * @author  Tech Banker
 * @package     gallery-master/views/general-settings
 * @version  2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
if ( ! is_user_logged_in() ) {
	return;
} else {
	$access_granted = false;
	foreach ( $user_role_permission as $permission ) {
		if ( current_user_can( $permission ) ) {
			$access_granted = true;
			break;
		}
	}
	if ( ! $access_granted ) {
		return;
	} elseif ( GENERAL_SETTINGS_GALLERY_MASTER === '1' ) {
		$search_box_background_color_controls = isset( $searchbox_settings_get_data['search_box_background_color_and_background_transparency'] ) ? explode( ',', esc_attr( $searchbox_settings_get_data['search_box_background_color_and_background_transparency'] ) ) : array( '', 100 );
		$search_box_border_color              = isset( $searchbox_settings_get_data['search_box_border_style'] ) ? explode( ',', esc_attr( $searchbox_settings_get_data['search_box_border_style'] ) ) : array( 2, 'solid', '#9e9e9e' );
		$search_box_margin                    = isset( $searchbox_settings_get_data['search_box_margin'] ) ? explode( ',', esc_attr( $searchbox_settings_get_data['search_box_margin'] ) ) : array( 0, 5, 20, 0 );
		$search_box_padding                   = isset( $searchbox_settings_get_data['search_box_padding'] ) ? explode( ',', esc_attr( $searchbox_settings_get_data['search_box_padding'] ) ) : array( 5, 10, 5, 10 );
		$search_box_font_style                = isset( $searchbox_settings_get_data['search_box_font_style'] ) ? explode( ',', esc_attr( $searchbox_settings_get_data['search_box_font_style'] ) ) : array( 14, '#000000' );
		?>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-custom-home"></i>
						<a href="admin.php?page=gallery_master">
							<?php echo esc_attr( $gallery_master ); ?>
						</a>
						<span>></span>
					</li>
					<li>
						<a href="admin.php?page=gm_global_options">
							<?php echo esc_attr( $gm_general_settings ); ?>
						</a>
						<span>></span>
					</li>
					<li>
						<span>
							<?php echo esc_attr( $gm_search_box_settings ); ?>
						</span>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box vivid-green">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-custom-magnifier"></i>
								<?php echo esc_attr( $gm_search_box_settings ); ?>
							</div>
						</div>
						<div class="portlet-body form">
							<form id="ux_frm_searchbox_settings">
								<div class="form-body">
									<div class="form-actions">
										<div class="pull-right">
											<input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo esc_attr( $gm_save_changes ); ?>">
										</div>
									</div>
									<div class="line-separator"></div>
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $gm_global_option_search_box_placeholder_text ); ?> :
											<span class="required" aria-required="true">* ( <?php echo esc_attr( $gm_premium_edition ); ?> )</span>
										</label>
										<input type="text" class="form-control" name="ux_txt_search_box_placeholder_text" id="ux_txt_search_box_placeholder_text" placeholder="<?php echo esc_attr( $gm_global_option_search_box_placeholder_text ); ?>" value="<?php echo isset( $searchbox_settings_get_data['search_box_placeholder_text'] ) ? esc_attr( $searchbox_settings_get_data['search_box_placeholder_text'] ) : 'Search ...'; ?>">
										<i class="controls-description"><?php echo esc_attr( $gm_global_option_search_box_placeholder_text_tooltip ); ?></i>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $gm_font_style ); ?> :
													<span class="required" aria-required="true">* ( <?php echo esc_attr( $gm_premium_edition ); ?> )</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_search_box_font_style_color[]" id="ux_txt_search_box_font_style" placeholder="<?php echo esc_attr( $gm_font_size_placeholder ); ?>" onblur="default_value_gallery_master('#ux_txt_search_box_font_style', 14)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval( $search_box_font_style[0] ); ?>">
													<input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_search_box_font_style_color[]" id="ux_txt_search_font_color"  onblur="default_value_gallery_master('#ux_txt_search_font_color', '#000000')" onfocus="color_picker_gallery_master(this, this.value)"  placeholder="<?php echo esc_attr( $gm_color_placeholder ); ?>" value="<?php echo esc_attr( $search_box_font_style[1] ); ?>">
												</div>
												<i class="controls-description"><?php echo esc_attr( $gm_font_style_title_tooltip ); ?></i>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $gm_font_family_title ); ?> :
													<span class="required" aria-required="true">* ( <?php echo esc_attr( $gm_premium_edition ); ?> )</span>
												</label>
												<select name="ux_ddl_search_font_family" id="ux_ddl_search_font_family" class="form-control">
													<?php
													if ( file_exists( GALLERY_MASTER_PLUGIN_DIR_PATH . 'includes/web-fonts.php' ) ) {
														include GALLERY_MASTER_PLUGIN_DIR_PATH . 'includes/web-fonts.php';
													}
													?>
												</select>
												<i class="controls-description"><?php echo esc_attr( $gm_lightbox_image_title_font_family_tooltip ); ?></i>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $gm_global_option_filter_background_color ); ?> :
													<span class="required" aria-required="true">* ( <?php echo esc_attr( $gm_premium_edition ); ?> )</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_search_box_background_controls[]" id="ux_txt_global_option_search_box_background_color" onfocus="color_picker_gallery_master(this, this.value)"  placeholder="<?php echo esc_attr( $gm_background_color ); ?>" value="<?php echo esc_attr( $search_box_background_color_controls[0] ); ?>">
													<input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_search_box_background_controls[]" id="ux_txt_global_option_search_box_background_color_transparency" placeholder="<?php echo esc_attr( $gm_background_transparency ); ?>" onblur="default_value_gallery_master('#ux_txt_global_option_search_box_background_color_transparency', 100)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onchange="check_opacity_gallery_master(this);" value="<?php echo intval( $search_box_background_color_controls[1] ); ?>">
												</div>
												<i class="controls-description"><?php echo esc_attr( $gm_background_color_transparency_tooltips ); ?></i>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $gm_border_style_title ); ?> :
													<span class="required" aria-required="true">* ( <?php echo esc_attr( $gm_premium_edition ); ?> )</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control input-width-25 input-inline" name="ux_txt_search_by_border_style[]" id="ux_txt_filter_border_style_width" placeholder="<?php echo esc_attr( $gm_width_placeholder ); ?>" onblur="default_value_gallery_master('#ux_txt_filter_border_style_width', 2)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval( $search_box_border_color[0] ); ?>">
													<select name="ux_txt_search_by_border_style[]" id="ux_ddl_search_by_border_style_thickness" class="form-control input-width-27 input-inline">
														<option value="none"><?php echo esc_attr( $gm_none ); ?></option>
														<option value="solid"><?php echo esc_attr( $gm_solid ); ?></option>
														<option value="dashed"><?php echo esc_attr( $gm_dashed ); ?></option>
														<option value="dotted"><?php echo esc_attr( $gm_dotted ); ?></option>
													</select>
													<input type="text" class="form-control input-normal input-inline" name="ux_txt_search_by_border_style[]" id="ux_txt_search_by_border_style_color" onblur="default_value_gallery_master('#ux_txt_search_by_border_style_color', '#9e9e9e')" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo esc_attr( $gm_color_placeholder ); ?>" value="<?php echo esc_attr( $search_box_border_color[2] ); ?>">
												</div>
												<i class="controls-description"><?php echo esc_attr( $gm_border_style_tooltip ); ?></i>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $gm_border_radius_title ); ?> :
											<span class="required" aria-required="true">* ( <?php echo esc_attr( $gm_premium_edition ); ?> )</span>
										</label>
										<div class="input-icon right">
											<input type="text" class="form-control" name="ux_txt_search_by_border_radius" id="ux_txt_search_by_border_radius" placeholder="<?php echo esc_attr( $gm_border_radius_title ); ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onblur="default_value_gallery_master('#ux_txt_search_by_border_radius', 0)" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset( $searchbox_settings_get_data['search_box_border_radius'] ) ? intval( $searchbox_settings_get_data['search_box_border_radius'] ) : 0; ?>">
										</div>
										<i class="controls-description"><?php echo esc_attr( $gm_layout_border_radius_tooltip ); ?></i>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $gm_margin_title ); ?> :
													<span class="required" aria-required="true">* ( <?php echo esc_attr( $gm_premium_edition ); ?> )</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_search_box_margin[]" id="ux_txt_search_box_margin_top" placeholder="<?php echo esc_attr( $gm_top ); ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_search_box_margin_top', 0);" value="<?php echo intval( $search_box_margin[0] ); ?>">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_search_box_margin[]" id="ux_txt_search_box_margin_right" placeholder="<?php echo esc_attr( $gm_right ); ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_search_box_margin_right', 5);" value="<?php echo intval( $search_box_margin[1] ); ?>">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_search_box_margin[]" id="ux_txt_search_box_margin_bottom" placeholder="<?php echo esc_attr( $gm_bottom ); ?>" onblur="default_value_gallery_master('#ux_txt_search_box_margin_bottom', 20);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval( $search_box_margin[2] ); ?>">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_search_box_margin[]" id="ux_txt_search_box_margin_left" placeholder="<?php echo esc_attr( $gm_left ); ?>" onblur="default_value_gallery_master('#ux_txt_search_box_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval( $search_box_margin[3] ); ?>">
												</div>
												<i class="controls-description"><?php echo esc_attr( $gm_margin_gallery_title_tooltip ); ?></i>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $gm_padding_title ); ?> :
													<span class="required" aria-required="true">* ( <?php echo esc_attr( $gm_premium_edition ); ?> )</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_search_box_padding[]" id="ux_txt_search_box_padding_top" placeholder="<?php echo esc_attr( $gm_top ); ?>" onblur="default_value_gallery_master('#ux_txt_search_box_padding_top', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval( $search_box_padding[0] ); ?>">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_search_box_padding[]" id="ux_txt_search_box_padding_right" placeholder="<?php echo esc_attr( $gm_right ); ?>" onblur="default_value_gallery_master('#ux_txt_search_box_padding_right', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval( $search_box_padding[1] ); ?>">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_search_box_padding[]" id="ux_txt_search_box_padding_bottom" placeholder="<?php echo esc_attr( $gm_bottom ); ?>" onblur="default_value_gallery_master('#ux_txt_search_box_padding_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval( $search_box_padding[2] ); ?>">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_search_box_padding[]" id="ux_txt_search_box_padding_left" placeholder="<?php echo esc_attr( $gm_left ); ?>" onblur="default_value_gallery_master('#ux_txt_search_box_padding_left', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval( $search_box_padding[3] ); ?>">
												</div>
												<i class="controls-description"><?php echo esc_attr( $gm_padding_gallery_title_tooltip ); ?></i>
											</div>
										</div>
									</div>
									<div class="line-separator"></div>
									<div class="form-actions">
										<div class="pull-right">
											<input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo esc_attr( $gm_save_changes ); ?>">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
	} else {
		?>
		<div class="page-bar">
			<ul class="page-breadcrumb">
					<li>
						<i class="icon-custom-home"></i>
						<a href="admin.php?page=gallery_master">
							<?php echo esc_attr( $gallery_master ); ?>
						</a>
						<span>></span>
					</li>
					<li>
					<a href="admin.php?page=gm_global_options">
						<?php echo esc_attr( $gm_general_settings ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $gm_search_box_settings ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-magnifier"></i>
							<?php echo esc_attr( $gm_search_box_settings ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">
							<strong><?php echo esc_attr( $gm_user_access_message ); ?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
