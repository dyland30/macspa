<?php

/**
 * This is the model class for table "promocion".
 *
 * The followings are the available columns in table 'promocion':
 * @property integer $idpromocion
 * @property string $titulo
 * @property string $contenido
 * @property string $imagen
 * @property string $fch_inicio
 * @property string $fch_fin
 * @property integer $orden
 * @property integer $flg_activo
 *
 * The followings are the available model relations:
 * @property Servicio[] $servicios
 */
class Promocion extends CActiveRecord
{
	public $rutaimagen;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'promocion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo','required'),
			array('rutaimagen', 'file', 'types'=>'jpg, gif, png'),
			array('orden, flg_activo', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>45),
			array('imagen', 'length', 'max'=>200),
			array('contenido, fch_inicio, fch_fin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idpromocion, titulo, contenido, imagen, fch_inicio, fch_fin, orden, flg_activo', 'safe', 'on'=>'search'),
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
			'servicios' => array(self::MANY_MANY, 'Servicio', 'promocion_servicio(idpromocion, idservicio)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpromocion' => 'Idpromocion',
			'titulo' => 'Titulo',
			'contenido' => 'Contenido',
			'imagen' => 'Imagen',
			'fch_inicio' => 'Fch Inicio',
			'fch_fin' => 'Fch Fin',
			'orden' => 'Orden',
			'flg_activo' => 'Flg Activo',
			'rutaimagen'=> 'Imagen'
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

		$criteria->compare('idpromocion',$this->idpromocion);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('fch_inicio',$this->fch_inicio,true);
		$criteria->compare('fch_fin',$this->fch_fin,true);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('flg_activo',$this->flg_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Promocion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
