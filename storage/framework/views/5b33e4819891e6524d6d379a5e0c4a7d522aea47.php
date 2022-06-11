<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="col-lg-4 col-sm-6 portfolio-item">
	          <div class="card h-100">
	            <a href="/categories/<?php echo e($category->id); ?>"><img class="card-img-top" height="200px" width="350px" src="<?php echo e(asset('images/' . $category->image)); ?>" alt=""></a>
	            <div class="card-body">
	              <h4 class="card-title">
	                <a style="color: #545659 
	                " href="#"><?php echo e($category->name); ?></a>
	              </h4>
	            </div>
	          </div>
	        </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="row">
		<ul class="pagination justify-content-center"> 
			<?php echo e($categories->links()); ?>

		</ul>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>