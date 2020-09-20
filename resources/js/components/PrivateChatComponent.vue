<style>
.image-container{
width: 50px;
height: 50px;
}
.image-container img {
    width: 100%;
    height: 100%;
}
</style>
<template>
    <div class="layout">
            <div class="navigation">
                <div class="container">
                    <div class="inside">
                        <div class="nav nav-tab menu">
                            <a href="#settings" data-toggle="tab" title="User Setting">
                                <i class="ti-panel"></i>
                                Setting
                            </a>
                            <a href="#members" data-toggle="tab" title="All members">
                                <i class="ti-home"></i>
                                All Friends
                            </a>
                            <a href="#discussions" data-toggle="tab" class="active" title="Chat">
                                <i class="ti-comment-alt"></i>
                                Recent Chat
                            </a>
                            <a href="#notifications" data-toggle="tab" class="f-grow1" title="Notifications">
                                <i class="ti-bell"></i>
                                Notifications
                            </a>
                            <a href="" id="dark" class="dark-theme" title="Use Night Mode">
                                <i class="ti-wand"></i>
                                Night Mode
                            </a>
                            <a href="sign-in.html" class="btn power" title="Sign Out"><i class="ti-power-off"></i></a>
                        </div>
                    </div>
                </div>
            </div><!-- Navigation -->

            <div class="sidebar" id="sidebar">
                <div class="container">
                    <div class="col-md-12">
                        <div class="tab-content">
                            <!-- Start of Discussions -->
                            <div id="discussions" class="tab-pane fade in active show">
                                <figure class="setting"><img class="avatar-xl" src="img/avatars/avatar-male-1.jpg" alt="avatar"></figure>
                                <span class="logo"><img src="img/logo.png" alt=""></span>
                                <div class="search">
                                    <form class="form-inline position-relative">
                                        <input type="search" class="form-control" id="conversations" placeholder="Search for conversations...">
                                        <button type="button" class="btn btn-link loop"><i class="ti-search"></i></button>
                                    </form>
                                    <button class="btn create" data-toggle="modal" data-target="#startnewchat"><i class="ti-pencil"></i></button>
                                </div>
                                <div class="list-group sort">
                                    <button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
                                    <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Favourit</button>
                                    <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Unread</button>
                                </div>
                                <div class="discussions" id="scroller" >
                                    <h1>Members</h1>
                                    <div class="list-group" id="chats" role="tablist">
                                        <div v-for="friend in users" :key="friend.id">
                                        <a href="#" v-if="activeFriend==friend.id" class="filterDiscussions all unread single active" id="list-chat-list" @click="activeFriend=friend.id" data-toggle="list" role="tab">
                                            <img class="avatar-md" src="img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Sarah" alt="avatar">

                                            <div v-if="onlineFriends.find(user=>user.id===friend.id)" class="status online"></div>
                                            <div v-else class="status offline"></div>

                                            <div class="data">
                                                <h5>{{ friend.name }}</h5>
                                                <div class="new bg-yellow">
                                                    <span>5+</span>
                                                </div>
                                                <span>Mon</span>
                                                <div v-if="typingFriend != null">
                                                <p v-if="typingFriend.id == friend.id">{{typingFriend.name}} is typing...</p>
                                                <p v-else>Some other Text.</p>
                                                </div>
                                                <div v-else>
                                                <p>Some other Text.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" v-else class="filterDiscussions all unread single" id="list-chat-list" @click="activeFriend=friend.id" data-toggle="list" role="tab">
                                            <img class="avatar-md" src="img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Sarah" alt="avatar">

                                            <div v-if="onlineFriends.find(user=>user.id===friend.id)" class="status online"></div>
                                            <div v-else class="status offline"></div>

                                            <div class="data">
                                                <h5>{{ friend.name }}</h5>
                                                <div class="new bg-yellow">
                                                    <span>5+</span>
                                                </div>
                                                <span>Mon</span>
                                                <div v-if="typingFriend != null">
                                                <p v-if="typingFriend.id == friend.id">{{typingFriend.name}} is typing...</p>
                                                <p v-else>Some other Text.</p>
                                                </div>
                                                <div v-else>
                                                <p>Some other Text.</p>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Discussions -->
                        </div>
                    </div>
                </div>
            </div><!-- Sidebar -->

            <div class="main" id="chat-dialog">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Start of Babble -->
                    <div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
                    <!-- Start of Chat -->
                    <div class="chat" id="chat1">
                        <div class="top">
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="inside">
                                        <div class="status online"></div>
                                        <div class="data">
                                            <h5><a href="#">{{user.name}}</a></h5>
                                            <span>Active now</span>
                                        </div>
                                        <button class="btn d-md-block d-none audio-call" title="Audio call">
                                            <i class="ti-headphone-alt"></i>
                                        </button>
                                        <button class="btn d-md-block d-none video-call" title="Video call">
                                            <i class="ti-video-camera"></i>
                                        </button>
                                        <button class="btn d-md-block d-none" title="More Info">
                                            <i class="ti-info"></i>
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-view-grid"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item audio-call"><i class="ti-headphone-alt"></i>Voice Call</a>
                                                <a href="#" class="dropdown-item video-call"><i class="ti-video-camera"></i>Video Call</a>
                                                <hr>
                                                <a href="#" class="dropdown-item"><i class="ti-server"></i>Clear History</a>
                                                <a href="#" class="dropdown-item"><i class="ti-hand-stop"></i>Block Contact</a>
                                                <a href="#" class="dropdown-item"><i class="ti-trash"></i>Delete Contact</a>
                                            </div>
                                        </div>
                                        <button class="btn back-to-mesg" title="Back">
                                            <i class="ti-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content" id="content">
                            <div class="container">
                                <div class="col-md-12" style="height:500px; overflow-y:scroll" v-chat-scroll>
                                    <div class="date">
                                        <hr>
                                        <span>Yesterday</span>
                                        <hr>
                                    </div>
                                    <div v-for="(message, index) in allMessages" :key="index">
                                        <div v-if="user.id===message.user.id" class="message" >
                                            <img class="avatar-md" src="img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Karen joye" alt="avatar">
                                            <div v-if="message.message" class="text-main">
                                                <div class="text-group">
                                                    <div class="text">
                                                        <p>{{message.message}}</p>
                                                    </div>
                                                </div>
                                                <span>09:46 AM</span>
                                            </div>
                                            <div v-else-if="message.file" class="text-main">
                                                <div class="text-group">
                                                    <div class="text">
                                                        <div class="attachment">
															<div class="image-container">
																<img :src="'/storage/chat/'+message.file">
																<!-- <span>80kb Document</span> -->
															</div>
														</div>
                                                    </div>
                                                </div>
                                                <span>09:46 AM</span>
                                            </div>
                                        </div>
                                        <div v-else-if="user.id!==message.user.id" class="message me" >
                                            <img class="avatar-md" src="img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Karen joye" alt="avatar">
                                            <div v-if="message.message" class="text-main">
                                                <div class="text-group me">
                                                    <div class="text me">
                                                        <p>{{message.message}}</p>
                                                    </div>
                                                </div>
                                                <span>09:46 AM</span>
                                            </div>
                                            <div v-else-if="message.file" class="text-main">
                                                <div class="text-group me">
                                                    <div class="text me">
                                                        <div class="attachment">
															<div class="image-container">
																<img :src="'/storage/chat/'+message.file">
																<!-- <span>80kb Document</span> -->
															</div>
														</div>
                                                    </div>
                                                </div>
                                                <span>09:46 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="typingFriend != null" class="message" >
											<img class="avatar-md" src="img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Karen joye" alt="avatar">
											<div class="text-main">
												<div class="text-group">
													<div class="text typing">
														<div class="wave">
															<span class="dot"></span>
															<span class="dot"></span>
															<span class="dot"></span>
														</div>
													</div>
												</div>
											</div>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-md-12">
                                <div class="bottom">
                                    <div class="text-area">
                                        <textarea class="form-control" placeholder="Start typing for reply..."
                                            @keydown="onTyping"
                                            @keyup.enter="sendMessage"
                                            v-model="message"
                                            type="text"
                                            name="message"
                                            rows="1">
                                        </textarea>
                                        <div class="add-smiles">
                                            <span title="add icon" class="em em-blush"></span>
                                        </div>
                                        <div class="smiles-bunch">
                                            <i class="em em---1"></i>
                                            <i class="em em-smiley"></i>
                                            <i class="em em-anguished"></i>
                                            <i class="em em-laughing"></i>
                                            <i class="em em-angry"></i>
                                            <i class="em em-astonished"></i>
                                            <i class="em em-blush"></i>
                                            <i class="em em-disappointed"></i>
                                            <i class="em em-worried"></i>
                                            <i class="em em-kissing_heart"></i>
                                            <i class="em em-rage"></i>
                                            <i class="em em-stuck_out_tongue"></i>
                                            <i class="em em-expressionless"></i>
                                            <i class="em em-bikini"></i>
                                            <i class="em em-christmas_tree"></i>
                                            <i class="em em-facepunch"></i>
                                            <i class="em em-pushpin"></i>
                                            <i class="em em-tada"></i>
                                            <i class="em em-us"></i>
                                            <i class="em em-rose"></i>
                                        </div>
                                        <button type="submit" class="btn send"><i class="ti-location-arrow"></i></button>
                                    </div>
                                    <label>
                                        <file-upload
                                            :post-action="'sendprivate-messages/'+this.activeFriend"
                                            ref='upload'
                                            v-model="files"
                                            @input-file="$refs.upload.active = true"
                                            :headers="{'X-CSRF-TOKEN': token}">
                                            <span class="btn attach"><i class="ti-clip"></i></span>
                                        </file-upload>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Chat -->
                    </div>

                </div>
            </div>
    </div> <!-- Layout -->
</template>

<script>
    export default {

        props:['user'],

        data() {
            return {
                allMessages:[],
                message:null,
                users:[],
                files:[],
                activeFriend:null,
                typingFriend:null,
                 onlineFriends:[],
                typingTimer: false,
                token:document.head.querySelector('meta[name="csrf-token"]').content
            }
        },

        created() {
            // this.fetchMessages();
             this.fetchUsers();

            Echo.join('pchat')
              .here((users) => {
                   console.log('online',users);
                   this.onlineFriends=users;
              })
              .joining((user) => {
                  this.onlineFriends.push(user);
                  console.log('joining',user.name);
              })
              .leaving((user) => {
                  this.onlineFriends.splice(this.onlineFriends.indexOf(user),1);
                  console.log('leaving',user.name);
              });

              Echo.private('privatechat.'+this.user.id)
                .listen('PrivateMessageSent',(e)=>{
                  console.log('pmessage sent')
                  this.activeFriend=e.message.user_id;
                  this.allMessages.push(e.message)
                  setTimeout(this.scrollToEnd,100);

              })
              .listenForWhisper('typing', (e) => {
                //   console.log(e.user.id);
                  if(e.user.id==this.activeFriend){
                    //   debugger;
                      this.typingFriend=e.user;
                    if(this.typingClock) clearTimeout();
                      this.typingClock=setTimeout(()=>{
                                            this.typingFriend=null;
                                        },20000);
                        }
                    });
                },
        watch:{
            activeFriend(val){
                this.fetchMessages();
            }
            },

        methods: {
            fetchMessages() {
                axios.get('getprivate_messages/'+this.activeFriend).then(response => {
                   this.allMessages = response.data;
                })
            },
            fetchUsers() {
            axios.get('/users').then(response => {
                this.users = response.data;
                // if(this.friends.length>0){
                //   this.activeFriend=this.friends[0].id;
                // }
            });
            },

        sendMessage(){
            if(!this.activeFriend){
            return alert('Please select friend');
            }
            axios.post('sendprivate-messages/'+this.activeFriend, {message: this.message,receiver_id: this.activeFriend})
            .then(response => {
                        this.message=null;
                        this.allMessages.push(response.data.message)
            });
        },

        onTyping(){
        Echo.private('privatechat.'+this.activeFriend).whisper('typing',{
          user:this.user

        });
      },
        }
    }
</script>

