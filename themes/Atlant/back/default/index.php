<div id="importCsvSteps">
    <h1><?php echo at('Import'); ?> CSV</h1>

    <strong><?php echo at('File'); ?> :</strong> <span id="importCsvForFile">&nbsp;</span><br/>
    <strong><?php echo at('Fields Delimiter'); ?> :</strong> <span id="importCsvForDelimiter">&nbsp;</span><br/>
    <strong><?php echo at('Text Delimiter'); ?> :</strong> <span id="importCsvForTextDelimiter">&nbsp;</span><br/>
    <strong><?php echo at('Table'); ?> :</strong> <span id="importCsvForTable">&nbsp;</span><br/><br/>

    <?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
    <?php echo CHtml::hiddenField("fileName", ""); ?>
    <?php echo CHtml::hiddenField("thirdStep", "0"); ?>

    <div id="importCsvFirstStep">
        <div id="importCsvFirstStepResult">
            &nbsp;
        </div>
        <?php  echo CHtml::button(at('Select CSV File'), array("id"=>"importStep1")); ?>
    </div>
    <div id="importCsvSecondStep">
        <div id="importCsvSecondStepResult">
            &nbsp;
        </div>
        <strong><?php echo at('Fields Delimiter'); ?></strong> <span class="require">*</span><br/>
        <?php echo CHtml::textField("delimiter", $delimiter); ?>
        <br/><br/>
	
	<strong><?php echo at('Text Delimiter'); ?></strong><br/>
        <?php echo CHtml::textField("textDelimiter", $textDelimiter); ?>
        <br/><br/>

        <strong><?php echo at('Table'); ?></strong> <span class="require">*</span><br/>
        <?php echo CHtml::dropDownList('table', '', $tablesArray);?><br/><br/>

        <?php
        echo CHtml::ajaxSubmitButton(at('Next'), '', array(
            'update' => '#importCsvSecondStepResult',
        ));
        ?>
    </div>
    <?php echo CHtml::endForm(); ?>

    <div id="importCsvThirdStep">
        <?php echo CHtml::beginForm('','post'); ?>
            <?php echo CHtml::hiddenField("thirdStep", "1"); ?>
            <?php echo CHtml::hiddenField("thirdDelimiter", ""); ?>
	    <?php echo CHtml::hiddenField("thirdTextDelimiter", ""); ?>
            <?php echo CHtml::hiddenField("thirdTable", ""); ?>
            <?php echo CHtml::hiddenField("thirdFile", ""); ?>
            <div id="importCsvThirdStepResult">
                &nbsp;
            </div>
            <div id="importCsvThirdStepColumnsAndForm">
                <div id="importCsvThirdStepColumns">&nbsp;</div><br/>
                <?php
                    echo CHtml::ajaxSubmitButton(at('Import'), '', array(
                        'update' => '#importCsvThirdStepResult',
                    ));
                ?>
            </div>
        <?php echo CHtml::endForm(); ?>
    </div>
    <br/>
    <span id="importCsvBread1">&laquo; <?php echo CHtml::link(at('Start over'), array("/importcsv"));?></span>
    <span id="importCsvBread2"> &laquo; <a href="javascript:void(0)" id="importCsvA2"><?php echo at('Fields Delimiter').", ".at('Text Delimiter')." ".at('and')." ".at('Table');?></a></span>
</div>
