root = exports ? this

root.ShopManager = new Marionette.Application()

#class Dialog extends Marionette.Region.Dialog
#  el: "#dialog-region"

root.ShopManager.addRegions
  mainRegion: "#main-region"
#  dialogRegion: Dialog
  headerRegion: "#header-region"

root.ShopManager.navigate = (route, options)->
  options = options || {}
  Backbone.history.navigate route, options

root.ShopManager.getCurrentRoute = ->
  Backbone.history.fragment

root.ShopManager.on "initialize:after", ->
  if Backbone.history
    Backbone.history.start()
    if @getCurrentRoute() is ""
      ShopManager.trigger "products:list"
