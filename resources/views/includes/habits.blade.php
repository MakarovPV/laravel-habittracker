	<div id="main" class="col-12 bg-white border-right pl-0 vh-100 position-relative">  <!-- Поле доходов/расходов -->
		<div id="mainchild">

					<table class=" table w-100 h3 border table-hover">
						@foreach($habits as $habit)
							<tr scope="raw" class="maintr" data-id="{{$habit->id}}">
								<td class=" col-4 text-center">
									{{$habit->habit_name}}
								</td>
								<td class="checkbox col-8 text-center">
									@for($i=0;$i < strlen($habit->daysOfHabit->habit_status); $i++)
										@if($habit->daysOfHabit->habit_status[$i] == '1')
											<div class="form-check form-check-inline checkbox-xl">
												<input class="form-check-input" type="checkbox" id="checkbox-3" value="option1" checked />
												<label class="form-check-label" for="checkbox-3"></label>
											</div>
										@else
											<div class="form-check form-check-inline checkbox-xl">
												<input class="form-check-input" type="checkbox" id="checkbox-3" value="option1" />
												<label class="form-check-label" for="checkbox-3"></label>
											</div>
										@endif	
									@endfor
								</td>
								<td class="text-center border">
									<a class="d-block text-decoration-none delete" href="">Удалить</a>
								</td>
							</tr>
			        	@endforeach
			        		
			        	
			        </table>
			        <div class="row main">
			        	<div class="row w-100 ml-0 pt-2 border-0 align-items-center">
					        <form class="w-100 p-1" method="POST" action="" class="" >
					        @csrf 
					        	<div class="form-row">
					        	<div class="col-12 d-none" id="add-form">
					        		<input type="text" class="w-100 form-control form-control-lg" name="habit_name">
					        		<input type="submit" name="button" id="addNewHabit" class="btn btn-primary mt-2 ml-1 w-100" value="Отправить" disabled>
					        	</div>		
							</form>
					    </div>	
		        	</div>
		        </div>


			        <div class="row main">
			        	<div class="row w-100 ml-0 pt-2 border-0 align-items-center">
					        <button type="button" class="btn btn-primary h-100 w-100 bg-dark float-left" id="btn">Добавить</button>
					    </div>	
		        	</div>


		        	<div class="row main">
			        	<div class="row w-100 ml-0 pt-2 border-0 align-items-center">
					        <a id="return" class="btn btn-primary mt-2 ml-1 w-100">Вернуться</a>
					    </div>	
		        	</div>

		</div>
	</div>


					