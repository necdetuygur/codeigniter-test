<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<title>ToDo</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div id="root">
		<form action="<?=base_url("form/add")?>" method="post">
			<table>
				<tr>
					<td>Name: </td>
					<td><input type="text" v-model="name"></td>
				</tr>
				<tr>
					<td>Content: </td>
					<td>
						<textarea v-model="content" cols="30" rows="5"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="button" value="Save" @click="Add();"></td>
				</tr>
			</table>
		</form>
		<hr>
		<table>
			<tr v-for="todo in todos">
				<td>{{todo.name}}</td>
				<td>{{todo.content}}</td>
				<td>{{todo.time}}</td>
				<td><button @click="Update(todo.name, todo.content, todo.id)">Update</button></td>
				<td><button @click="Delete(todo.id)">Delete</button></td>
			</tr>
		</table>
	</div>
	<script type="text/javascript">
		var root = new Vue({
			el: "#root",
			data: {
				name: "",
				content: "",
				todos: []
			},
			methods: {
				Delete: (id) => {
					$.post("<?=base_url("form/delete")?>", {
						id: id
					}, (r) => {
						root.Get();
						console.log(r);
					});
				},
				Update: (name, content, id) => {
					$.post("<?=base_url("form/update")?>", {
						id: id,
						name: prompt("Name", name),
						content: prompt("Content", content)
					}, (r) => {
						root.Get();
						console.log(r);
					});
				},
				Add: () => {
					$.post("<?=base_url("form/add")?>", {
						name: root.name,
						content: root.content
					}, (r) => {
						root.name = "";
						root.content = "";
						root.Get();
						console.log(r);
					});
				},
				Get: () => {
					$.get("<?=base_url("form/get")?>", (r) => {
						root.todos = r;
					});
				}
			}
		});
		root.Get();
	</script>
</body>
</html>