<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $idcliente
 * @property string $nombres
 * @property string $apellidos
 * @property string $dni
 * @property string $correo
 * @property string $celular
 * @property string $telefono
 * @property string $login
 * @property string $clave
 *
 * The followings are the available model relations:
 * @property Reserva[] $reservas
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, apellidos', 'length', 'max'=>60),
			array('dni, correo, celular, telefono, login, clave', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcliente, nombres, apellidos, dni, correo, celular, telefono, login, clave', 'safe', 'on'=>'search'),
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
			'reservas' => array(self::HAS_MANY, 'Reserva', 'idcliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcliente' => 'Idcliente',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'dni' => 'Dni',
			'correo' => 'Correo',
			'celular' => 'Celular',
			'telefono' => 'Telefono',
			'login' => 'Login',
			'clave' => 'Clave',
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

		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('clave',$this->clave,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
