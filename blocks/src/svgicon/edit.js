import { __ } from '@wordpress/i18n';
import { Icon } from '@wordpress/icons';
import { RawHTML } from '@wordpress/element';

import {
	useBlockProps,
	InspectorControls,
	MediaUpload,
	__experimentalColorGradientSettingsDropdown as ColorGradientSettingsDropdown,
	__experimentalUseMultipleOriginColorsAndGradients as useMultipleOriginColorsAndGradients,
	__experimentalSpacingSizesControl as SpacingSizesControl
} from '@wordpress/block-editor';

import * as BlockEditor from '@wordpress/block-editor';
console.log(BlockEditor); // DimensionControl não aparece aqui

import { PanelBody, PanelRow, Button } from '@wordpress/components';
import { useEntityRecord } from "@wordpress/core-data";
import { wordpress } from '@wordpress/icons';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

const getInlineSvg = (id) => {

	const { record: attachment, isLoading } = useEntityRecord(
		"postType",
		"attachment",
		id
	);

	if (attachment?.meta?._eli_inline_svg) {
		return (
			<RawHTML>
				{attachment?.meta?._eli_inline_svg}
			</RawHTML>
		)
	}

	return (wordpress);
};

export default function Edit({ attributes, setAttributes }) {

	const colorGradientSettings = useMultipleOriginColorsAndGradients()
	return (
		<>
			<p {...useBlockProps()}>
				<Icon icon={getInlineSvg(attributes.id)} />
			</p>

			<InspectorControls group="dimensions">

				<SpacingSizesControl
					label="Margin"
					onChange={(value) => setAttributes({ margin: value })}
					values={attributes.margin}
				/>

			</InspectorControls>

			<InspectorControls group="color">

				<ColorGradientSettingsDropdown

					style={{ 'margin': 0 }}
					settings={[
						{
							label: 'Fill',
							colorValue: attributes.fill,
							onColorChange: (color) => setAttributes({ fill: color }),
						}
					]}
					{...colorGradientSettings}
				/>

				<ColorGradientSettingsDropdown

					style={{ 'margin': 0 }}
					settings={[
						{
							label: 'Stroke',
							colorValue: attributes.stroke,
							onColorChange: (color) => setAttributes({ stroke: color }),
						}
					]}
					{...colorGradientSettings}
				/>

				<ColorGradientSettingsDropdown

					style={{ 'margin': 0 }}
					settings={[
						{
							label: 'Background',
							colorValue: attributes.background,
							onColorChange: (color) => setAttributes({ background: color }),
						}
					]}
					{...colorGradientSettings}
				/>
			</InspectorControls>

			<InspectorControls >
				<PanelBody title='Icon Settings'>
					<PanelRow>
						<div className='eli-svg-icon-preview'>
							<Icon icon={getInlineSvg(attributes.id)} />
						</div>
					</PanelRow>
					<PanelRow>
						<MediaUpload
							title="Select form image"
							allowedTypes={['image/svg+xml']}
							value={attributes.id}
							onSelect={(selectedSvg) => setAttributes({ id: selectedSvg.id })}
							render={({ open }) => {

								if (!attributes.id) {

									return (
										<Button variant="secondary" onClick={open} >Select Icon</Button>
									)
								} else {
									return (<>
										<Button variant="secondary" isDestructive onClick={() => setAttributes({ id: null })}>Remove Icon</Button>
									</>
									)
								}
							}}

						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
		</>
	);
}
