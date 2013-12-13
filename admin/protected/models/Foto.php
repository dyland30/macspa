<?php

/**
 * This is the model class for table "foto".
 *
 * The followings are the available columns in table 'foto':
 * @property integer $idfoto
 * @property string $titulo
 * @property string $img_orig
 * @property string $img_small
 * @property string $fch_creacion
 * @property integer $idgaleria
 *
 * The followings are the available model relations:
 * @property Galeria $idgaleria0
 */
class Foto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
    public $rutaimagen;
    
	public function tableName()
	{
		return 'foto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    
			array('idgaleria', 'numerical', 'integerOnly'=>true),
                        //array('rutaimagen', 'file', 'types' => 'jpg, gif, png'),
			array('titulo', 'length', 'max'=>45),
			array('img_orig, img_small', 'length', 'max'=>100),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idfoto, titulo, img_orig, img_small, fch_creacion, idgaleria', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idgaleria0' => array(self::BELONGS_TO, 'Galeria', 'idgaleria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfoto' => 'Idfoto',
			'titulo' => 'Titulo',
			'img_orig' => 'Imagen Original',
			'img_small' => 'Imgagen Small',
			'fch_creacion' => 'Fecha Creacion',
			'idgaleria' => 'Idgaleria',
                        'rutaimagen' => 'Imagen'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idfoto',$this->idfoto);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('img_orig',$this->img_orig,true);
		$criteria->compare('img_small',$this->img_small,true);
		$criteria->compare('fch_creacion',$this->fch_creacion,true);
		$criteria->compare('idgaleria',$this->idgaleria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         public function getGalerias(){
            $lista = Galeria::model()->findAll();
            
            $array = CHtml::listData($lista, 'idgaleria','descripcion');
            return $array;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Foto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
