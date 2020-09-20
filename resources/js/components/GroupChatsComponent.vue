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
                                <div class="discussions" id="scroller">
                                    <h1>Members</h1>
                                    <div class="btn-group add-group" role="group">
                                        <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Add +
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                          <a class="dropdown-item" href="#">New user</a>
                                          <a class="dropdown-item" href="#">New Group +</a>
                                            <a class="dropdown-item" href="#">Private Chat +</a>
                                        </div>
                                      </div>
                                    <div class="list-group" id="chats" role="tablist">
                                        <a href="#list-chat" class="filterDiscussions all unread single active" v-for="(user, index) in users" :key="index" id="list-chat-list" data-toggle="list" role="tab">
                                            <img class="avatar-md" src="img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Sarah" alt="avatar">
                                            <div class="status online"></div>

                                            <div class="data">
                                                <h5>{{ user.name }}</h5>
                                                <div class="new bg-yellow">
                                                    <span>5+</span>
                                                </div>
                                                <span>Mon</span>
                                                <p>A new feature has been updated...</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Discussions -->
                        </div>
                    </div>
                </div>
            </div><!-- Sidebar -->

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="requests">
                        <div class="title">
                            <h1>Add your friends</h1>
                            <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                        </div>
                        <div class="content">
                            <form>
                                <div class="form-group">
                                    <label for="user">Username:</label>
                                    <input type="text" class="form-control" id="user" placeholder="Add recipient..." required>
                                    <div class="user" id="contact">
                                        <img class="avatar-sm" src="img/avatars/avatar-female-5.jpg" alt="avatar">
                                        <h5>Karen joye</h5>
                                        <button type="reset" class="btn"><i class="ti-close"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="welcome">Message:</label>
                                    <textarea class="text-control" id="welcome" placeholder="Send your welcome message...">Hi Karen joye, I'd like to add you as a contact.</textarea>
                                </div>
                                <button type="submit" class="btn button w-100">Send Friend Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Add Friends -->

            <div class="modal fade" id="startnewchat" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="requests">
                        <div class="title">
                            <h1>Start new chat</h1>
                            <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                        </div>
                        <div class="content">
                            <form>
                                <div class="form-group">
                                    <label for="participant">Recipient:</label>
                                    <input type="text" class="form-control" id="participant" placeholder="Add recipient..." required>
                                    <div class="user" id="recipient">
                                        <img class="avatar-sm" src="img/avatars/avatar-female-5.jpg" alt="avatar">
                                        <h5>Karen joye</h5>
                                        <button type="reset" class="btn"><i class="ti-close"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="topic">Topic:</label>
                                    <input type="text" class="form-control" id="topic" placeholder="What's the topic?" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message:</label>
                                    <textarea class="text-control" id="message" placeholder="Send your welcome message...">Hmm, are you friendly?</textarea>
                                </div>
                                <button type="submit" class="btn button w-100">Start New Chat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Create Chat -->

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
                                    <div v-for="(message, index) in messages" :key="index">
                                        <div v-if="user.id===message.user.id" class="message" >
                                            <img class="avatar-md" src="img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Karen joye" alt="avatar">
                                            <div class="text-main">
                                                <div class="text-group">
                                                    <div class="text">
                                                        <p>{{message.message}}</p>
                                                    </div>
                                                </div>
                                                <span>09:46 AM</span>
                                            </div>
                                        </div>
                                        <div v-else-if="user.id!==message.user.id" class="message me" >
                                            <img class="avatar-md" src="img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Karen joye" alt="avatar">
                                            <div class="text-main">
                                                <div class="text-group">
                                                    <div class="text">
                                                        <p>{{message.message}}</p>
                                                    </div>
                                                </div>
                                                <span>09:47 AM</span>
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
                                            @keydown="sendTypingEvent"
                                            @keyup.enter="sendMessage"
                                            v-model="newMessage"
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
                                        <input type="file">
                                        <span class="btn attach"><i class="ti-clip"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Chat -->
                    <!-- Start of Call -->
                        <div class="call" id="call1">
                            <div class="content">
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="inside">
                                            <div class="panel">
                                                <div class="participant">
                                                    <img class="avatar-xxl" src="img/avatars/avatar-female-5.jpg" alt="avatar">
                                                    <span>Connecting to Sarah</span>
                                                    <div class="wave">
                                                        <span class="dot"></span>
                                                        <span class="dot"></span>
                                                        <span class="dot"></span>
                                                    </div>
                                                </div>
                                                <div class="options">
                                                    <button class="btn option"><i class="ti-microphone"></i></button>
                                                    <button class="btn option"><i class="ti-video-camera"></i></button>
                                                    <button class="btn option"><i class="ti-user">+</i></button>
                                                    <button class="btn option"><i class="ti-volume"></i></button>
                                                    <button class="btn option"><i class="ti-comment"></i></button>
                                                </div>
                                                <button class="btn option call-end"><i class="ti-close"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Call -->
                    </div>
                    <!-- End of Babble -->
                    <!-- Start of Babble -->
                    <div class="babble tab-pane fade" id="list-empty" role="tabpanel" aria-labelledby="list-empty-list">
                    <!-- Start of Chat -->
                    <div class="chat" id="chat">
                        <div class="top">
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="inside">
                                        <div class="status offline"></div>
                                        <div class="data">
                                            <h5><a href="#">Bob Frank</a></h5>
                                            <span>Inactive</span>
                                        </div>
                                        <button class="btn d-md-block d-none audio-call" title="Audio call"><i class="ti-headphone-alt"></i></button>
                                        <button class="btn d-md-block d-none video-call" title="Video call"><i class="ti-video-camera"></i></button>
                                        <button class="btn d-md-block d-none" title="More Info"><i class="ti-info"></i></button>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-view-grid"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="ti-headphone-alt"></i>Voice Call</a>
                                                <a href="#" class="dropdown-item"><i class="ti-video-camera"></i>Video Call</a>
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
                        <div class="content empty">
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="no-messages">
                                        <i class="ti-comments"></i>
                                        <p>Seems people are shy to start the chat. Break the ice send the first message.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-md-12">
                                <div class="bottom">
                                    <form class="text-area">
                                        <textarea class="form-control" placeholder="Start typing for reply..." rows="1"></textarea>
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
                                    </form>
                                    <label>
                                        <input type="file">
                                        <span class="btn attach"><i class="ti-clip"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Chat -->
                    <!-- Start of Call -->
                        <div class="call" id="call2">
                            <div class="content">
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="inside">
                                            <div class="panel">
                                                <div class="participant">
                                                    <img class="avatar-xxl" src="img/avatars/avatar-female-2.jpg" alt="avatar">
                                                    <span>Connecting to sarah</span>
                                                    <div class="wave">
                                                        <span class="dot"></span>
                                                        <span class="dot"></span>
                                                        <span class="dot"></span>
                                                    </div>
                                                </div>
                                                <div class="options">
                                                    <button class="btn option"><i class="ti-microphone"></i></button>
                                                    <button class="btn option"><i class="ti-video-camera"></i></button>
                                                    <button class="btn option"><i class="ti-user">+</i></button>
                                                    <button class="btn option"><i class="ti-volume"></i></button>
                                                    <button class="btn option"><i class="ti-comment"></i></button>
                                                </div>
                                                <button class="btn option call-end"><i class="ti-close"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Call -->
                    </div>
                    <!-- End of Babble -->

                </div>
            </div>
    </div> <!-- Layout -->
</template>

<script>
    export default {

        props:['user'],

        data() {
            return {
                messages: [],
                newMessage: '',
                users:[],
                activeUser: false,
                typingTimer: false,
            }
        },

        created() {
            this.fetchMessages();
            // Echo.private('chat')
            // .listen('MessageSent',(event) => {
            //         console.log(event);
            //         this.messages.push(event.message);
            //     })

            Echo.join('chat')
                .listen('MessageSent',(event) => {
                    console.log('event');
                    this.messages.push(event.message);
                })
                .here(user => {
                    this.users = user;
                })
                .joining(user => {
                    this.users.push(user);
                })
                .leaving(user => {
                    this.users = this.users.filter(u => u.id != user.id);
                })
                .listenForWhisper('typing', user => {
                   this.activeUser = user;

                    if(this.typingTimer) {
                        clearTimeout(this.typingTimer);
                    }

                   this.typingTimer = setTimeout(() => {
                       this.activeUser = false;
                   }, 3000);
                })

        },

        methods: {
            fetchMessages() {
                axios.get('getmessages').then(response => {
                    this.messages = response.data;
                })
            },

            sendMessage() {

                this.messages.push({
                    user: this.user,
                    message: this.newMessage
                });

                axios.post('sendmessages', {message: this.newMessage});

                this.newMessage = '';
            },

            sendTypingEvent() {
                Echo.join('chat')
                    .whisper('typing', this.user);
            }
        }
    }
</script>
