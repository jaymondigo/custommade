<?php
use LaravelBook\Ardent\Ardent;

class ProjectPhoto extends Ardent {

    use Codesleeve\Stapler\Stapler;


	protected $table = 'project_photos';
	
    public function __construct(array $attributes = array()) {
      $this->hasAttachedFile('photo', [
          'styles' => [
            'medium' => '300x300#',
            'thumb' => '80x80#'
          ],
          'default_url' => '/system/missing.jpg',
          'keep_old_files' => true
      ]);

      parent::__construct($attributes);
    } 

    public static $rules = array(); 
     
    protected $appends = array('url');

    public function project(){
        return $this->belongsTo('Project');
    }
    public function getUrlAttribute(){
      return array(
                    'small'=>$this->photo->url('thumb'),
                    'medium'=>$this->photo->url('medium'),
                    'original'=>$this->photo->url()
                    );
    }
}