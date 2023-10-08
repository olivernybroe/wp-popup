import {Button, Panel, PanelBody, SelectControl} from "@wordpress/components";
import {useSelect} from "@wordpress/data";
import {registerBlockType} from "@wordpress/blocks";
import {InspectorControls, useBlockProps} from "@wordpress/block-editor";


registerBlockType('olivernybroe/popup', {
    attributes: {
        popupId: {
            type: "string",
        },
        triggerType: {
            type: "string"
        }
    },
    edit: ({attributes, setAttributes}) => {
        let popups = useSelect((select) => {
            return select('core').getEntityRecords('postType', 'wp_popup' );
        }) ?? []
        popups = popups.map(popup => ({value: popup.id, label: `${popup.title.rendered} (${popup.id})`}))
        popups.push({value: 0, label: "Nothing"})
        const blockProps = useBlockProps();

        return [
            <InspectorControls>
                <Panel>
                    <PanelBody>
                        <SelectControl
                            value={ attributes.popupId }
                            label="Popup to display"
                            options={popups}
                            onChange={(newPopupId) => {
                                setAttributes({popupId: newPopupId})
                            }}
                        />
                        <SelectControl
                            value={ attributes.triggerType }
                            label="Trigger"
                            options={[
                                {value: "exit_intent", label: "Exit Intent"},
                                {value: "instant", label: "Instant"},
                            ]}
                            onChange={(newTriggerType) => {
                                setAttributes({triggerType: newTriggerType})
                            }}
                        />
                    </PanelBody>
                </Panel>
            </InspectorControls>,
            <div { ...blockProps }>
                <Button variant="secondary">
                    Show popup (not implemented)
                </Button>
            </div>
        ]
    },
})