# Grav Facebook Chat (Customer Chat) Plugin

## About

**Facebook Chat (Customer Chat) Plugin** allows you to integrate the Facebook Messenger experience directly into your website. This allows your customers to interact with your business anytime with the same personalized, rich-media experience they get in Messenger.

The customer chat plugin supports all desktop and mobile browsers except Messenger in-app browsers.
*Note*: Support for Safari 12 has been temporarily disabled.

You can learn more about Messenger customer chat by clicking [here](https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin/)

![](assets/git/customer_chat_plugin_example.png)

## Installation

To install this plugin, just download the zip version of this repository and unzip it under `/user/plugins` and rename the folder to `facebook-chat`. You can download the last version from [here](https://github.com/Kuzmanov/grav-plugin-facebook-chat/releases).

**Soon** you should be able to install the plugin from the main Grav repository.

## Configuration

## Usage

In order to display the Customer Chat, add the following code before the `</body>` tag in your theme:

```
{{ facebookChat() }}
```