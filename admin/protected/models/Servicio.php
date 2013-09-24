<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $idservicio
 * @property string $nombre
 * @property string $descripcion
 * @property integer $idcategoria
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Local[] $locals
 * @property Personal[] $personals
 * @property Promocion[] $promocions
 * @property Reserva[] $reservas
 * @property Categoria $idcategoria0
 */
class Servicio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        
			array('idcategoria', 'numerical', 'integerOnly'=>true),
			array('nombre', 'required'),
                        array('nombre, descripcion', 'length', 'max'=>45),
			array('precio', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idservicio, nombre, descripcion, idcategoria, precio', 'safe', 'on'=>'search'),
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
			'locals' => array(self::MANY_MANY, 'Local', 'local_servicio(servicio_idservicio, local_idlocal)'),
			'personals' => array(self::MANY_MANY, 'Personal', 'personal_servicio(idservicio, idPersonal)'),
			'promocions' => array(self::MANY_MANY, 'Promocion', 'promocion_servicio(idservicio, idpromocion)'),
			'reservas' => array(self::MANY_MANY, 'Reserva', 'reserva_servicio(servicio_idservicio, reserva_idreserva)'),
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'idcategoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idservicio' => 'Idservicio',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'idcategoria' => 'Categoría',
			'precio' => 'Precio',
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

		$criteria->compare('idservicio',$this->idservicio);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idcategoria',$this->idcategoria);
		$criteria->compare('precio',$this->precio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

         public function getCategorias(){
            $lista = Categoria::model()->findAll();
            
            $array = CHtml::listData($lista, 'idcategoria','nombre');
            return $array;
        }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Servicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
