<?php

namespace OliverNybroe\Popup\Blocks;

use OliverNybroe\Popup\Contracts\Block;

class PopupBlock implements Block {
	public function path(): string
	{
		return __DIR__ . '/../../components/blocks/popup';
	}

	public function attributes(): array
	{
		return  [
			'popupId' => [
				'type' => 'string',
			],
			'triggerType' => [
				'type' => 'string',
				'default' => 'exit_intent',
			],
		];
	}

	public function render(array $attributes): string|null
	{
		$popupId = $attributes['popupId'] ?? null;
		if ($popupId === null) {
			return null;
		}

		/** @var \WP_Post $popup */
		$popup = get_post($popupId);
		if ($popup === null) {
			return null;
		}

		ob_start();
		?>

		<style>
            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 9999; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                max-width: 100% !important;
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                width: 40%;
                max-width: 800px;
            }

            /* The Close Button */
            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }
		</style>

		<!-- The Modal -->
		<div id="myModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<span class="close" onclick="closePopup()">&times;</span>
				<?= $popup->post_content ?>
			</div>

		</div>

		<script>
            let alreadyOpened = false;

            // Get the modal
            const modal = document.getElementById("myModal");

            function openPopup() {
                alreadyOpened = true;
                modal.style.display = 'block';
            }
            function closePopup() {
                modal.style.display = 'none';
            }

            // Show when pressing link
            document.addEventListener('click', function (event) {
                if (event.target.tagName.toLowerCase() !== 'a') return

                if (alreadyOpened) return

                event.preventDefault()

                openPopup()
            })

            // When user clicks outside open modal
            document.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closePopup()
                }
            })
            // When user moves cursor outside browser
            window.addEventListener('mouseout', function (event) {
                if (alreadyOpened) return

                if (event.clientY < 30) {
                    openPopup()
                }
            })
            // When user tries to go back or reload page
            window.addEventListener('beforeunload', function (event) {
                if (alreadyOpened) return

                openPopup();
                event.preventDefault();
                return event.returnValue = "Are you sure you want to leave the page?";
            })

		</script>

		<?php
		return ob_get_clean();
	}
}