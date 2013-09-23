<?php

/**
 * This is the model class for table "personal".
 *
 * The followings are the available columns in table 'personal':
 * @property integer $idPersonal
 * @property string $nombres
 * @property string $apellidos
 * @property string $dni
 * @property string $direccion
 * @property string $fechaNacimiento
 * @property string $correo
 * @property string $celular
 * @property string $telefono
 * @property integer $idlocal
 * @property integer $flg_activo
 * @property string $personalcol
 *
 * The followings are the available model relations:
 * @property Local $idlocal0
 * @property Servicio[] $servicios
 */
class Personal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPersonal', 'required'),
			array('idPersonal, idlocal, flg_activo', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos, dni, direccion, correo, personalcol', 'length', 'max'=>45),
			array('celular, telefono', 'length', 'max'=>20),
			array('fechaNacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPersonal, nombres, apellidos, dni, direccion, fechaNacimiento, correo, celular, telefono, idlocal, flg_activo, personalcol', 'safe', 'on'=>'search'),
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
			'idlocal0' => array(self::BELONGS_TO, 'Local', 'idlocal'),
			'servicios' => array(self::MANY_MANY, 'Servicio', 'personal_servicio(idPersonal, idservicio)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPersonal' => 'Id Personal',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'dni' => 'Dni',
			'direccion' => 'Direccion',
			'fechaNacimiento' => 'Fecha Nacimiento',
			'correo' => 'Correo',
			'celular' => 'Celular',
			'telefono' => 'Telefono',
			'idlocal' => 'Idlocal',
			'flg_activo' => 'Flg Activo',
			'personalcol' => 'Personalcol',
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

		$criteria->compare('idPersonal',$this->idPersonal);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('fechaNacimiento',$this->fechaNacimiento,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('idlocal',$this->idlocal);
		$criteria->compare('flg_activo',$this->flg_activo);
		$criteria->compare('personalcol',$this->personalcol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Personal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
