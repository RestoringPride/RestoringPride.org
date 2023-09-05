<?php
/**
 * Multi-Form Goals block/shortcode template
 * Styles for this template are defined in 'blocks/multi-form-goals/common.scss'
<<<<<<< HEAD
 * @var Give\MultiFormGoals\MultiFormGoal\Model $this
 */
=======
 *
 */

>>>>>>> fb785cbb (Initial commit)
?>


<?php
<<<<<<< HEAD
if ( ! empty($this->getInnerBlocks())) {
    echo $this->getInnerBlocks();
=======
if ( ! empty($this->innerBlocks)) {
    echo $this->innerBlocks;
>>>>>>> fb785cbb (Initial commit)
} else {
    ?>
    <div class="give-multi-form-goal-block">
        <div class="give-multi-form-goal-block__content">
            <div class="give-multi-form-goal-block__image">
<<<<<<< HEAD
                <img src="<?= esc_url($this->getImageSrc()) ?>"  alt="goal image"/>
            </div>
            <div class="give-multi-form-goal-block__text">
                <h2>
                    <?= esc_html($this->getHeading()) ?>
                </h2>
                <p>
                    <?= esc_html($this->getSummary()) ?>
=======
                <img src="<?php
                echo $this->getImageSrc(); ?>" />
            </div>
            <div class="give-multi-form-goal-block__text">
                <h2>
                    <?php
                    echo $this->getHeading(); ?>
                </h2>
                <p>
                    <?php
                    echo $this->getSummary(); ?>
>>>>>>> fb785cbb (Initial commit)
                </p>
            </div>
        </div>
        <?php
        echo $this->getProgressBarOutput(); ?>
    </div>
<?php
} ?>
