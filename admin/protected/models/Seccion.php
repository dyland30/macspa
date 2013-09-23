<?php

/**
 * This is the model class for table "seccion".
 *
 * The followings are the available columns in table 'seccion':
 * @property integer $idseccion
 * @property string $titulo
 * @property string $contenido
 * @property string $div_id
 * @property integer $flg_activo
 * @property integer $Usuario_idUsuario
 *
 * The followings are the available model relations:
 * @property Usuario $usuarioIdUsuario
 */
class Seccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('flg_activo, Usuario_idUsuario', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>200),
			array('div_id', 'length', 'max'=>45),
			array('contenido', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idseccion, titulo, contenido, div_id, flg_activo, Usuario_idUsuario', 'safe', 'on'=>'search'),
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
			'usuarioIdUsuario' => array(self::BELONGS_TO, 'Usuario', 'Usuario_idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idseccion' => 'Idseccion',
			'titulo' => 'Titulo',
			'contenido' => 'Contenido',
			'div_id' => 'Div',
			'flg_activo' => 'Flg Activo',
			'Usuario_idUsuario' => 'Usuario Id Usuario',
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

		$criteria->compare('idseccion',$this->idseccion);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('div_id',$this->div_id,true);
		$criteria->compare('flg_activo',$this->flg_activo);
		$criteria->compare('Usuario_idUsuario',$this->Usuario_idUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Seccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}