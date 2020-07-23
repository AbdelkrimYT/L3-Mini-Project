<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplaneModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'airplane_models';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'number_of_economy_class_seats',
        'number_of_businessmen_seats',
        'number_of_first_class_seats',
    ];
    
    /*protected $guarded=[
        'id'
    ];*/


    public function add($data)
    {
        $obj = new AirplaneModel;
        foreach ($data->toArray() as $key => $value)
            $obj[$key] = $value;
        return $obj->save();
    }
    
    public static function deleteBy($id)
    {
        foreach (AirplaneModel::find($id)->airplanes as $orm)
            Airplane::find($orm->id)->delete();
        AirplaneModel::find($id)->delete();
    }
    
    public function updateData($data)
    {
        $obj = $this::find($data->id);
        foreach ($data->toArray() as $key => $value)
            $obj[$key] = $value;
        return $obj->save();
    }
    
    public function airplanes()
    {
        return $this->hasMany('App\Airplane', 'model_id', 'id');
    }
}