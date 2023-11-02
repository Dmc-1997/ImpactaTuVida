
<div class="">
	<span class="mb-5 categories_style-title__iVrAX">Categorias</span>
	
	<div class="mt-5 container-fluid">
		@foreach ($categories as $category)
			<div class="container-fluid p-4 mb-5 EditCategories_box-container__29mrQ">
				<div class="row">
					<div class="col-md-2 EditCategories_container-icon__TsBvH">
						<img src="{{ $category->icon }}" alt="" class="EditCategories_icon-styles__e7cNM">
						<br>
						<span>{{ $category->title }}</span>
					</div>
					<div class="col-md-10">
						<div class="col-md-9 d-flex align-items-center">
							<div class="EditCategories_container-menu__SCdIF">
								<ul class="nav mb-3 mt-3 EditCategories_container-menu__SCdIF">
									<li class="nav-item text-center">
										<a class="EditCategories_style-nav__VK5BI" wire:click="edit({{ $category->id }})" href="javascript:;">
											Editar Nombre / Logo
											<img
												class="me-2 EditCategories_icon-edit-style__OSMuo"
												src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAABtCAYAAABuinXHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA9dJREFUeNrsnc1RGzEUgBeGAkgDjDnmBB2w7sCpIHYFsY85GU4cgQpwKoAOgA7sE8d40kAoIXoTeQYOZn8krX7e983sLGOzv5+f9km7K1UVAAAAAACE5YBTEI+fX/+cm1ltpuN3H7+Z6fH69WSL6PwFi9yllbyPtZnujPAVovOUfGNm8w6LPJvpmxH+huh8JN+b2bTHohLdYxfZh5z+5CULci1/cNk+otOXvKM265kiumzJO35wjS5f8o7TPlUvIjpsdj0NsOqaojstNoHWO0J0QtiGjlkq+4NoJbIRnZ/sN0RHTLxs8jWE7EdEx6tCSdv13P4dUvZz37taiPZbT54Glr3ou+BBoBMgVYCJmS6qj/daYyKRcOXrPm9DY8jKbGf2ybKy3H3HTcq+XyYhuuV91phIIiO3/J4DSg4h+9N1DVp022TkKWHJlS1d7geQ7LMYd5bsTfS7hCQHRvYRnpCSfcn2ItmL6EAN90NE9lDH2Ve2N8nOos0BTDKULKwH/jF3le1VslMyZnZcouJ3Qll1W27NSVwMKLlrgnbWZf/acuSw7CRHyVJNiXhZksiu9sn29cSnb9HfW1ZnZOc3th4btR7dpQ4dMPf4VHYoehXdttj+2+I6OHZ9TDUGAyWYqyFl903G2lRPFkhujOyb1EU34tr6VLjkwQklGsntiu5F9hGN5HSuz4hWIlm9aC2SVYvWJFmtaG2SVYrWKFmdaK2SVYnWLFmNaO2SVYhGsgLRSFYgGskKRCNZgWgkKxCNZAWiA/YZkr3k0iIayaWLtq/YHCN5P0eFRPN5ipLt68MyRX+GrhTRZylJto9DS2I4effZ1sxmsYQfEtFBiusPki0S2Q82yhHdkzqx4nqy52uJ9CWi+ydiKSVeI8fvET1wsZ1ldl2y6DMkE9FILkh0jeTCRXtOxIqVXEJEnyNZh2jXREze374tXbJwpCiiRar0wvBi52vfwwIiOhwve5Ix1VKLEy2doErHL9X/zmWRWnBEVy493mqCHg8QDYgGRAOiAdGAaEA0IBoQjWhANCAaEA2IBkQDogHRgGhANKJdGSk+pyNVom0/Hhq5KEl0m6EI59oMN3RrsWOdjejr1xPZ2W3Dvy3NgV9qiWxznLWZPVXN/Z1tYuyfy0DhXfrd3FbxhxUOSd3hf7/EGJzV5U2Nuw6iR8oTtB2rWCPw9k7GbPH9iLtOXMXasGvWPWuZmIGRHPPlPyfRthgaI7tVkX2ZdT3aFuHI3s9tMSPZWdmn8svF64eaxnjIwcCDVK8aGg2WtuFAY+uYJKi/jGASVQAAAAAAAIBM+SfAAI+syMKwTDhuAAAAAElFTkSuQmCC"
												alt=""
											/>
										</a>
									</li>
									<li class="nav-item text-center">
										@if($enterPosition == $category->id)
											<div class="input-group">
												<input type="text"
													class="form-control input-data-configuration"
													wire:model="position"
													>
													<button class="btn btn-style" style="width: auto;height: auto;" type="button" wire:click="updatePosition({{ $category->id}})">Guardar</button>
											</div>
										@else
											<span class="EditCategories_style-nav__VK5BI" wire:click="editPosition({{ $category->id}})">
												Posición de la categoría {{ $category->position }}
												<img
													class="me-2 EditCategories_icon-edit-style__OSMuo"
													src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAABtCAYAAABuinXHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA9dJREFUeNrsnc1RGzEUgBeGAkgDjDnmBB2w7sCpIHYFsY85GU4cgQpwKoAOgA7sE8d40kAoIXoTeQYOZn8krX7e983sLGOzv5+f9km7K1UVAAAAAACE5YBTEI+fX/+cm1ltpuN3H7+Z6fH69WSL6PwFi9yllbyPtZnujPAVovOUfGNm8w6LPJvpmxH+huh8JN+b2bTHohLdYxfZh5z+5CULci1/cNk+otOXvKM265kiumzJO35wjS5f8o7TPlUvIjpsdj0NsOqaojstNoHWO0J0QtiGjlkq+4NoJbIRnZ/sN0RHTLxs8jWE7EdEx6tCSdv13P4dUvZz37taiPZbT54Glr3ou+BBoBMgVYCJmS6qj/daYyKRcOXrPm9DY8jKbGf2ybKy3H3HTcq+XyYhuuV91phIIiO3/J4DSg4h+9N1DVp022TkKWHJlS1d7geQ7LMYd5bsTfS7hCQHRvYRnpCSfcn2ItmL6EAN90NE9lDH2Ve2N8nOos0BTDKULKwH/jF3le1VslMyZnZcouJ3Qll1W27NSVwMKLlrgnbWZf/acuSw7CRHyVJNiXhZksiu9sn29cSnb9HfW1ZnZOc3th4btR7dpQ4dMPf4VHYoehXdttj+2+I6OHZ9TDUGAyWYqyFl903G2lRPFkhujOyb1EU34tr6VLjkwQklGsntiu5F9hGN5HSuz4hWIlm9aC2SVYvWJFmtaG2SVYrWKFmdaK2SVYnWLFmNaO2SVYhGsgLRSFYgGskKRCNZgWgkKxCNZAWiA/YZkr3k0iIayaWLtq/YHCN5P0eFRPN5ipLt68MyRX+GrhTRZylJto9DS2I4effZ1sxmsYQfEtFBiusPki0S2Q82yhHdkzqx4nqy52uJ9CWi+ydiKSVeI8fvET1wsZ1ldl2y6DMkE9FILkh0jeTCRXtOxIqVXEJEnyNZh2jXREze374tXbJwpCiiRar0wvBi52vfwwIiOhwve5Ix1VKLEy2doErHL9X/zmWRWnBEVy493mqCHg8QDYgGRAOiAdGAaEA0IBoQjWhANCAaEA2IBkQDogHRgGhANKJdGSk+pyNVom0/Hhq5KEl0m6EI59oMN3RrsWOdjejr1xPZ2W3Dvy3NgV9qiWxznLWZPVXN/Z1tYuyfy0DhXfrd3FbxhxUOSd3hf7/EGJzV5U2Nuw6iR8oTtB2rWCPw9k7GbPH9iLtOXMXasGvWPWuZmIGRHPPlPyfRthgaI7tVkX2ZdT3aFuHI3s9tMSPZWdmn8svF64eaxnjIwcCDVK8aGg2WtuFAY+uYJKi/jGASVQAAAAAAAIBM+SfAAI+syMKwTDhuAAAAAElFTkSuQmCC"
													alt=""
												/>
											</span>
										@endif
									</li>
									<li class="nav-item text-center">
										<a class="EditCategories_style-nav__VK5BI" href="javascript:;" wire:click="toggleActive({{ $category->id }})">
											Activa:  {!! Utils::labelStatus($category->status) !!}
											<img
												class="me-2 EditCategories_icon-edit-style__OSMuo"
												src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAABtCAYAAABuinXHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA9dJREFUeNrsnc1RGzEUgBeGAkgDjDnmBB2w7sCpIHYFsY85GU4cgQpwKoAOgA7sE8d40kAoIXoTeQYOZn8krX7e983sLGOzv5+f9km7K1UVAAAAAACE5YBTEI+fX/+cm1ltpuN3H7+Z6fH69WSL6PwFi9yllbyPtZnujPAVovOUfGNm8w6LPJvpmxH+huh8JN+b2bTHohLdYxfZh5z+5CULci1/cNk+otOXvKM265kiumzJO35wjS5f8o7TPlUvIjpsdj0NsOqaojstNoHWO0J0QtiGjlkq+4NoJbIRnZ/sN0RHTLxs8jWE7EdEx6tCSdv13P4dUvZz37taiPZbT54Glr3ou+BBoBMgVYCJmS6qj/daYyKRcOXrPm9DY8jKbGf2ybKy3H3HTcq+XyYhuuV91phIIiO3/J4DSg4h+9N1DVp022TkKWHJlS1d7geQ7LMYd5bsTfS7hCQHRvYRnpCSfcn2ItmL6EAN90NE9lDH2Ve2N8nOos0BTDKULKwH/jF3le1VslMyZnZcouJ3Qll1W27NSVwMKLlrgnbWZf/acuSw7CRHyVJNiXhZksiu9sn29cSnb9HfW1ZnZOc3th4btR7dpQ4dMPf4VHYoehXdttj+2+I6OHZ9TDUGAyWYqyFl903G2lRPFkhujOyb1EU34tr6VLjkwQklGsntiu5F9hGN5HSuz4hWIlm9aC2SVYvWJFmtaG2SVYrWKFmdaK2SVYnWLFmNaO2SVYhGsgLRSFYgGskKRCNZgWgkKxCNZAWiA/YZkr3k0iIayaWLtq/YHCN5P0eFRPN5ipLt68MyRX+GrhTRZylJto9DS2I4effZ1sxmsYQfEtFBiusPki0S2Q82yhHdkzqx4nqy52uJ9CWi+ydiKSVeI8fvET1wsZ1ldl2y6DMkE9FILkh0jeTCRXtOxIqVXEJEnyNZh2jXREze374tXbJwpCiiRar0wvBi52vfwwIiOhwve5Ix1VKLEy2doErHL9X/zmWRWnBEVy493mqCHg8QDYgGRAOiAdGAaEA0IBoQjWhANCAaEA2IBkQDogHRgGhANKJdGSk+pyNVom0/Hhq5KEl0m6EI59oMN3RrsWOdjejr1xPZ2W3Dvy3NgV9qiWxznLWZPVXN/Z1tYuyfy0DhXfrd3FbxhxUOSd3hf7/EGJzV5U2Nuw6iR8oTtB2rWCPw9k7GbPH9iLtOXMXasGvWPWuZmIGRHPPlPyfRthgaI7tVkX2ZdT3aFuHI3s9tMSPZWdmn8svF64eaxnjIwcCDVK8aGg2WtuFAY+uYJKi/jGASVQAAAAAAAIBM+SfAAI+syMKwTDhuAAAAAElFTkSuQmCC"
												alt=""
											/>
										</a>
									</li>
									<li class="nav-item text-center">
										<a class="EditCategories_style-nav__VK5BI" href="#" href="javascript:void(0);" type="button" onclick="return confirmDestroyRow('adminCategoryDelete', {{ $category->id }})">
											Eliminar <i class="fa fa-trash me-2 EditCategories_icon-edit-style__OSMuo text-danger"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>

	<div wire:ignore.self class="modal fade" id="editCategory" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editCategoryLabel">Categoría</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="Modal_content__+C9Xp">
						<div class="container-fluid p-4 mb-5 text-center">
							<div class="row mt-3">
								<div class="grid-containe">
									<div><span>Logo</span></div>
									<div class="mt-3">
										@if(empty($icon))
											<img
												class="EditLogo_style-img-perfil__gMJSB"
												src="data:image/png;base64,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"
												alt=""
												id="img-perfil"
											/>
										@else
											<img
												class="EditLogo_style-img-perfil__gMJSB"
												src="{{$icon}}"
												alt=""
												id="img-perfil"
											/>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="container-fluid p-5 mb-5 categories_box-container__jYbDX">
							<div class="row text-center">
								<div class="col-5 categories_grid-container__TPYIE">
									<div class="d-flex gap-2">
										<label class="" for="icon">
											Icono 
										</label>
										<span class="categories_style-asterik__zzZvb">*</span>
									</div>
									<div class="d-flex gap-2">
										<label class="" for="title ">
											Título 
										</label>
										<span class="categories_style-asterik__zzZvb">*</span>
									</div>
									<div class="d-flex gap-2">
										<label class="" for="subtitle">
											Subtítulo
										</label>
										<span class="categories_style-asterik__zzZvb">*</span>
									</div>
									<div class="d-flex gap-2">
										<label class="">
											Categoria Activa
										</label>
										<span class="categories_style-asterik__zzZvb">*</span>
									</div>
								</div>
								<div class="col-7 categories_grid-container__TPYIE">
									<div>
										<input
											id="icon"
											type="text"
											class="class-basic mb-2 input-data-configuration"
											wire:model="icon"
											@error('icon') is-invalid @enderror/>
									</div>
									<div>
										<input
											type="text" 
											class="class-basic mb-2 input-data-configuration"
											wire:model="title"
											@error('title') is-invalid @enderror
											id="title"
											/>
									</div>
									<div>
										<input
											id="subtitle"
											type="text"
											class="class-basic mb-2 input-data-configuration"
											wire:model="subtitle"
											@error('subtitle') is-invalid @enderror/>
									</div>
									<div class="categories_container-button-activa__pPLnc">
										<div class="">
											<input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" wire:click="toggleActive({{ $category->id }})"/>
											<label class="btn categories_btn-outline-primary__CiyLq {{$category->status ? 'btn-success' : 'btn-danger'}}" for="btncheck1"> {!! Utils::labelStatus($category->status) !!} </label>
										</div>
									</div>
								</div>
								<div class="col-12 mt-3"><button type="button" wire:click="update" class="btn-style">Actualizar</button></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>