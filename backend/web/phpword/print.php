<?php

/* @var $model common\models\Ydgwkdsld */

$this->title = "生成word";
/**
 * Header file
 */
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

use yii\bootstrap\Html;

error_reporting(E_ALL);
define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
//define('IS_INDEX', SCRIPT_FILENAME == 'index');

// 由于在框架中运行 IS_INDEX始终为1,所以强制设置为0
define('IS_INDEX', 0);

Autoloader::register();
Settings::loadConfig();

// Set writers
$writers = array('Word2007' => 'docx', 'ODText' => 'odt', 'RTF' => 'rtf', 'HTML' => 'html', 'PDF' => 'pdf');

// Set PDF renderer
if (null === Settings::getPdfRendererPath())
{
  $writers['PDF'] = null;
}

// Return to the caller script when runs by CLI
if (CLI)
{
  return;
}

// Set titles and names
$pageHeading = str_replace('_', ' ', SCRIPT_FILENAME);
$pageTitle = IS_INDEX ? 'Welcome to ' : "{$pageHeading} - ";
$pageTitle .= 'PHPWord';
$pageHeading = IS_INDEX ? '' : "<h1>{$pageHeading}</h1>";


// Populate samples
$files = '';
if ($handle = opendir('phpword'))
{
  while (false !== ($file = readdir($handle)))
  {
    if (preg_match('/^Sample_\d+_/', $file))
    {
      $name = str_replace('_', ' ', preg_replace('/(Sample_|\.php)/', '', $file));
      $files .= "<li><a href='{$file}'>{$name}</a></li>";
    }
  }
  closedir($handle);
}

/**
 * Write documents
 *
 * @param \PhpOffice\PhpWord\PhpWord $phpWord
 * @param string $filename
 * @param array $writers
 *
 * @return string
 */
function write($phpWord, $filename, $writers)
{
  $result = '';

  // Write documents
  foreach ($writers as $format => $extension)
  {
    $result .= date('H:i:s') . " Write to {$format} format";
    if (null !== $extension)
    {
      $targetFile = __DIR__ . "/results/{$filename}.{$extension}";
      $phpWord->save($targetFile, $format);
    } else
    {
      $result .= ' ... NOT DONE!';
    }
    $result .= EOL;
  }

  $result .= getEndingNotes($writers);

  return $result;
}

/**
 * Get ending notes
 *
 * @param array $writers
 *
 * @return string
 */
function getEndingNotes($writers)
{
  $result = '';

  // Do not show execution time for index
  if (!IS_INDEX)
  {
    $result .= date('H:i:s') . " Done writing file(s)" . EOL;
    $result .= date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB" . EOL;
  }

  // Return
  if (CLI)
  {
    $result .= 'The results are stored in the "results" subdirectory.' . EOL;
  } else
  {
    if (!IS_INDEX)
    {
      $types = array_values($writers);
      $result .= '<p>&nbsp;</p>';
      $result .= '<p>';
      foreach ($types as $type)
      {
        if (!is_null($type))
        {

          $resultFile = 'phpword/results/' . 'output' . '.' . $type;
          if (file_exists($resultFile))
          {
            $time = time();
            $result .= "<a href='/admin/{$resultFile}' class='btn btn-success btn-flat'>下载受理表单{$time}.{$type}</a> ";
          }
        }
      }
      $result .= '</p>';

    }
  }

  return $result;
}


// Template processor instance creation
echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('phpword/resources/sample.docx');

// Variables on different parts of document
$templateProcessor->setValue('created_at', Html::encode(Yii::$app->formatter->asDatetime($model->created_at)));
$templateProcessor->setValue('sn', Html::encode($model->sn));
$templateProcessor->setValue('customer_name', Html::encode($model->customer_name));
$templateProcessor->setValue('customer_phone', Html::encode($model->customer_phone));
$templateProcessor->setValue('address', Html::encode($model->address));
$templateProcessor->setValue('address_detail', Html::encode($model->address_detail));
$templateProcessor->setValue('package_price', Html::encode($model->package_price));
$templateProcessor->setValue('primary_phone_number', Html::encode($model->primary_phone_number));
$templateProcessor->setValue('secondly_phone_number_1', Html::encode($model->secondly_phone_number_1));
$templateProcessor->setValue('secondly_phone_number_2', Html::encode($model->secondly_phone_number_2));
$templateProcessor->setValue('secondly_phone_number_3', Html::encode($model->secondly_phone_number_3));

$templateProcessor->setValue('customer_confirm_name', Html::encode($model->customer_confirm_name));
$templateProcessor->setValue('customer_confirm_time', Html::encode(Yii::$app->formatter->asDatetime($model->customer_confirm_time)));
$templateProcessor->setValue('business_person_name', Html::encode($model->business_person_name));
$templateProcessor->setValue('business_person_phone', Html::encode($model->business_person_phone));


echo date('H:i:s'), ' Saving the result document...', EOL;
$templateProcessor->saveAs('phpword/results/output.docx');

echo getEndingNotes(array('Word2007' => 'docx'));

Yii::$app->getSession()->setFlash('alert', [
  'body' => '表单生成完毕,点击下面的按钮进行下载',
  'options' => ['class' => 'alert-info']
]);

if (CLI)
{
  return;
}
?>
