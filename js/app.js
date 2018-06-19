new Vue({
  el: ".container",
  data: {
    title: "FIRSTVIEW UI DEVELOPER TEST",
    cardFlipped: true,
    showSnack: false,
    errors: [],
    name: null,
    email: null,
    date: null,
    password: null
  },
  methods: {
    flipCard: function(){
      if (this.cardFlipped){
        this.cardFlipped = false
      } else {
          this.cardFlipped = true
      }
    },
    //Simple Form Validation -- Only checks if required fields has values.
    checkForm: function(e){
      if(this.name && this.email && this.password) {
        this.flipCard()
        this.showSnackBar()
        e.preventDefault()
        return true
      }

      this.errors = []
      if(!this.name){
        this.errors.push('Name Required')
      }
      if(!this.email){
        this.errors.push('Email Required')
      }
      if(!this.password){
        this.errors.push('Password Required')
      }

      e.preventDefault()
    },
    showSnackBar: function(){
      setTimeout(function(){
        this.showSnack = true
      }.bind(this), 1000)
      setTimeout(function(){
        this.showSnack = false;
        this.clearValues()
      }.bind(this), 5000);
    },
    clearValues: function(){
      this.name = null,
      this.email = null,
      this.date = null,
      this.password = null
    }
  }
})
