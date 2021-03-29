<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showField): ?>
    <label class="radio radio-solid">
        <?= Form::radio($name, $options['value'], $options['checked'], $options['attr']) ?>
        <span></span>
        <?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
            <?= $options['label'] ?>
        <?php endif; ?>
    </label>
    <?php include 'errors.php' ?>
    <?php include 'help_block.php' ?>
<?php endif; ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
