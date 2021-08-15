var io = require('socket.io')(6001)
console.log('connected port 6001')
io.on('error', function(socket){
	console.log('error')
})
io.on('connection', function(socket){
	console.log('co nguoi vua ket noi' + socket.id)
})
var Redis = require('ioredis')
var redis = new Redis(1000)
redis.psubscribe("*", function(error, count){
	//
})
redis.on('pmessage', function(partner, chanel, message){
	console.log(partner)
	console.log(chanel)
	console.log(message)
	message = JSON.parse(message)
	if(chanel == 'darkmovies_database_payment')
	{
		io.emit(chanel + ":" + message.event, message.data.payment)
	}
	else if(chanel == 'darkmovies_database_resBill')
	{
		io.emit(chanel + ":" + message.event, message.data)
						console.log(message.data)
	}
	else{
			io.emit(chanel + ":" + message.event, message.data.chats)

	}
	console.log('sent')
})