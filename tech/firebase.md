```js

module.exports = {
    async find(db, id) {
        const user = await db.ref(`users/${id}`).once('value');
        return user.val();
    },

    create(db, id, newUser) {
        return db.ref(`users/${id}`).set(newUser);
    },

    update(db, id, newUser) {
        db.ref(`users/${id}`).update(newUser);
    },

    async remove(db, id) {
        await db.ref(`users/${id}`).remove();
    },

    // ------------- AUTHENTICATION ------------- //

    async createAuthentication(authentication, body) {
        await authentication.createUserWithEmailAndPassword(body.email, body.password);
    },

    checkAuthentication(authentication, body) {
        return authentication.signInWithEmailAndPassword(
            body.email,
            body.password,
        );
    },

    async getToken(user) {
        const token = await user.getIdToken();
        return token;
    },

    logout(authentication) {
        return authentication.signOut();
    },

    removeAuthentication(admin, id) {
        admin.auth().deleteUser(id);
    },
};
