   <?php foreach($childs as $child) : ?>     
             

             <div class="card-deck mb-3 text-center">
                  <div class="card mb-4 box-shadow">
                  <div class="card-header">
                  <h4 class="my-0 font-weight-normal"><?=$child->name?></h4>
                  </div>
                  <div class="card-body">
                  <ul class="list-unstyled mt-3 mb-4">

      <?php if(count($lessonModel->hasClase($child->id))) : ?>
      <?php foreach($lessonModel->hasClase($child->id) as $clase): ?>
                <?php if($clase->published !=0 ): ?>
<li >
 <a href="<?php echo URL . 'clases/show/' . $clase->url ?>"><?=$clase->name?></a> 
</li>

     <?php endif ?>
      <?php endforeach ?>
      <?php endif ?>

        
         <?php if(count($lessonModel->childs($child->id))) : ?>
<?php $this->insert('tree/lessonChild', ['childs' => $lessonModel->childs($child->id) , 'lessonModel' => $lessonModel]) ?>
      <?php endif ?>                                


                      </ul>
                    </div>
                  </div>
              </div>
   <?php endforeach ?>