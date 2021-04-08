<?php
namespace LaraCourse\Models;
use Illuminate\Database\Eloquent\Model;
use LaraCourse\Models\Photo;
use LaraCourse\Models\User;
use function substr;

class Album extends Model 
{
   
    protected $table ='albums';
    protected $primaryKey = 'id';
    protected  $fillable = ['album_name','description','user_id'];
  
     public function  getPathAttribute(){
          $url = $this->album_thumb;
          if(stristr($this->album_thumb ,'http') === false){
              $url = 'storage/'.$this->album_thumb;
          }
          return $url;
    }
  
    public function photos()
    {
        return $this->hasMany(Photo::class, 'album_id', 'id');
    }
   public function user(){
         return $this->belongsTo(User::class);
   }
   
   public function  categories()
   {
       // album_album_category
       return $this->belongsToMany(AlbumCategory::class,'album_category', 'album_id', 'category_id')->
           withTimestamps();
   }
   public function getShortDescrAttribute(){
       return substr($this->description,0, 60).'...';
   }
}