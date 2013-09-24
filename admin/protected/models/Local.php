<?php

/**
 * This is the model class for table "local".
 *
 * The followings are the available columns in table 'local':
 * @property integer $idlocal
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 *
 * The followings are the available model relations:
 * @property Servicio[] $servicios
 * @property Personal[] $personals
 * @property Reserva[] $reservas
 */
class Local extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'local';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'length', 'max'=>45),
			array('direccion', 'length', 'max'=>100),
			array('telefono', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idlocal, nombre, direccion, telefono', 'safe', 'on'=>'search'),
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
			'servicios' => array(self::MANY_MANY, 'Servicio', 'local_servicio(local_idlocal, servicio_idservicio)'),
			'personals' => array(self::HAS_MANY, 'Personal', 'idlocal'),
			'reservas' => array(self::HAS_MANY, 'Reserva', 'idlocal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlocal' => 'Idlocal',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
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

		$criteria->compare('idlocal',$this->idlocal);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Local the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
