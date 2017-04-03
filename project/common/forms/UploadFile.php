<?php
namespace common\forms;

use common\models\Files;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadFile extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;
    public $globalPath = 'files';

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'html, xml, csv'],
        ];
    }

    public function upload()
    {
        if(!Yii::$app->user->isGuest){
            if ($this->validate()) {
                $filename = md5(time());
                if(!$this->file->saveAs(Yii::getAlias('@uploads').DIRECTORY_SEPARATOR.$this->filePath() .$filename . '.' . $this->file->extension)){
                    $this->addError('file', Yii::t('form/UploadFile','Unknown type'));
                }else{
                    return $filename . '.' . $this->file->extension;
                }
            } else {
                $this->addError('file', Yii::t('form/UploadFile','Unknown type'));
            }
        }else{
            $this->addError('file', Yii::t('form/UploadFile','Unknown user'));
        }
        return false;
    }

    public function filePath(){
        $dir = $this->globalPath.DIRECTORY_SEPARATOR.Yii::$app->user->id.DIRECTORY_SEPARATOR;
        if(!is_dir(Yii::getAlias('@uploads').DIRECTORY_SEPARATOR.$dir)){
          mkdir(Yii::getAlias('@uploads').DIRECTORY_SEPARATOR.$dir, 0777, true);
        }
        return $dir;
    }
    public function attributeLabels()
    {
        return [
            'file' => Yii::t('form/UploadFile','file'),
        ];
    }
}